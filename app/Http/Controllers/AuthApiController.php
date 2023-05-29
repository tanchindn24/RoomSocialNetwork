<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthApiController extends Controller
{

    public function sendResponse($result, $message): \Illuminate\Http\JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404): \Illuminate\Http\JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }
        return response()->json($response, $code);
    }

    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirmed_password' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation error.', $validator->errors());
        }

        $dataInput = $request->all();

        $user = User::create([
            'name' => $dataInput['name'],
            'email' => $dataInput['email'],
            'password' => Hash::make($dataInput['password']),
            'roles' => 3,
            'status' => 2,
        ]);

        $success['token'] = $user->createToken('MobileAppAndroid')->accessToken;
        $success['name'] = $user->name;

        return $this->sendResponse($success, 'Register successfully');
    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $success = [];

            if ($user->roles == 2) {
                $success['token'] = $user->createToken('MobileAppAndroid')->accessToken;
                $success['roles'] = 2;
                return $this->sendResponse($success, 'Provider login successfully');
            } elseif ($user->roles == 3) {
                $success['token'] = $user->createToken('MobileAppAndroid')->accessToken;
                $success['roles'] = 3;
                return $this->sendResponse($success, 'Seeker login successfully');
            } else {
                Auth::logout();
                return $this->sendError('Unauthorized', ['error' => 'Unauthorized']);
            }
        }

        return $this->sendError('Unauthorized', ['error' => 'Unauthorized']);
    }

    public function logout(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->user()->token()->revoke();
        return $this->sendResponse([], 'Logout successfully');
    }
}
