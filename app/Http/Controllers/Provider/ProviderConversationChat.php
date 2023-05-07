<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\User;
use Google\Cloud\Core\Exception\GoogleException;
use Google\Cloud\Firestore\FieldValue;
use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Uuid;

class ProviderConversationChat extends Controller
{

    public const MAXIMUM_LAST_MESSAGE_CHARACTER = 10;

    public const FIREBASE_PROJECT_ID = 'laravel-chat-app-firebase';

    /**
     * @throws GoogleException
     */
    public function chatWithSeeker(string $id = null)
    {
        $currentId = Auth::id();

        $firestore = new FirestoreClient([
            'projectId' => self::FIREBASE_PROJECT_ID
        ]);

        if ($id === null) {
            $conversationMessageRef = $firestore->collection('conversation_message');
            $messagesInConversation = $conversationMessageRef
                ->where('provider_id', '=', $currentId)
                ->orderBy('created_at', 'DESC')
                ->documents();

            $allProviderId = [];

            foreach ($messagesInConversation as $document)
            {
                $allProviderId[] = $document->get('seeker_id');
            }

            $lastProviderId = null;

            if (count($allProviderId) > 0) {
                $lastProviderId = reset($allProviderId);
            }

            if (empty($lastProviderId)) {
                return view('provider.conversation.chat', compact('currentId'));
            }

            return redirect("/provider/conversation/chat/$lastProviderId")
                ->with([
                    'receiverId' => $lastProviderId,
                    'currentId' => $currentId,
                ]);
        }

        $receiverId = User::find($id);

        if ($receiverId === null) {
            die('seeker not found');
        }

        $conversation = $firestore->collection('conversation');
        $documentId = null;

        $existingConversation = $conversation
            ->where('provider_id', '=', $currentId)
            ->where('seeker_id', '=', $receiverId->id)
            ->limit(1)
            ->documents();

        if (!$existingConversation->isEmpty()) {
            $conversationId = null;
            foreach ($existingConversation as $document1) {
                $conversationData = $document1->data();
                $conversationId = $conversationData['id'];
                $documentId = $document1->id();
            }
        } else {
            $newConversation = $conversation->add([
                'id' => Uuid::uuid4()->toString(),
                'provider_id' => $currentId,
                'seeker_id' => $receiverId->id,
                'updated_at' => FieldValue::serverTimestamp(),
            ]);
            $newConversationSnapshot = $newConversation->snapshot();
            $conversationId = $newConversationSnapshot->get('id');
            $documentId = $newConversation->id();
        }

        return view('provider.conversation.chat', [
            'receiverId' => $receiverId,
            'currentId' => $currentId,
            'conversationId' => $conversationId,
            'documentId' => $documentId
        ]);
    }

    /**
     * @throws GoogleException
     * @throws \JsonException
     */
    public function getChatList(): bool|string
    {
        $currentId = Auth::id();

        $firestore = new FirestoreClient([
            'projectId' => self::FIREBASE_PROJECT_ID
        ]);

        $conversationRef = $firestore->collection('conversation');

        $querySeeker = $conversationRef->where('provider_id', '=', $currentId);

        $conversation = [];
        $lastConversationId = null;
        $createdAt = '';

        $documentSeeker = $querySeeker->documents();

        foreach ($documentSeeker as $document) {
            $receiverId = $document->get('seeker_id');
            $createdAt = $document->get('updated_at');
            $conversationId = $document->get('id');

            $receiver = User::where('id', $receiverId)
                ->first();

            if ($receiver) {
                $existingConversation = array_filter($conversation, function ($c) use ($document) {
                    return $c['id'] === $document->id();
                });

                if (empty($existingConversation)) {
                    $conversationMessageRef = $firestore->collection('conversation_message');
                    $queryLastMessageSeeker = $conversationMessageRef
                        ->where('conversation_id', '=', $conversationId)
                        ->where('is_deleted', '=', false)
                        ->orderBy('created_at', 'DESC');

                    $lastDocument = $queryLastMessageSeeker->documents();
                    $lastMessage = '';

                    foreach ($lastDocument as $document1) {
                        $lastMessage = $document1->get('message');
                        $lastMessage = mb_substr($lastMessage, 0, self::MAXIMUM_LAST_MESSAGE_CHARACTER, 'UTF-8');
                        break;
                    }

                    $unreadQuery = $conversationMessageRef
                        ->where('conversation_id', '=', $document->get('id'))
                        ->where('is_provider_seen', '=', false)
                        ->where('type', '=', 3)
                        ->documents()->size();

                    $unread = $unreadQuery ?? 0;

                    $conversation[] = [
                        'id' => $document->id(),
                        'name' => $receiver->name,
                        'seeker_id' => $receiverId,
                        'last_message' => $lastMessage,
                        'unread' => $unread,
                        'avatar' => $receiver->avatar,
                        'created_at' => $createdAt,
                    ];
                }
            }
        }

        $createdAtColumns = array_column($conversation, 'created_at');
        array_multisort($createdAtColumns, SORT_DESC, $conversation);

        if (empty($conversation)) {
            $response = [
                'message' => 'No conversation'
            ];
        } else {
            $response = [
                'message' => 'success',
                'conversations' => $conversation
            ];
        }

        return json_encode($response, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
    }
}
