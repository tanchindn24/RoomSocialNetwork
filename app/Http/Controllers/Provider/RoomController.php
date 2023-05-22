<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use App\Models\House;
use App\Models\Room;
use App\Models\Service;
use App\Models\ServiceCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{

    private function convertNumber($string): int
    {
        return (int)str_replace('.', '', $string);
    }

    public function serviceList(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $service = Service::where('user_id', Auth::user()->id)
            ->paginate(5);
        return view('provider.services.list', compact('service'));
    }

    public function serviceCreate(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $category = ServiceCategories::where('status', 1)
            ->get();

        return view('provider.services.create', compact('category'));
    }

    public function serviceStore(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $storeService = new Service();

        $storeService->name = $request->input('name');
        $storeService->user_id = Auth::user()->id;
        $storeService->category_id = $request->input('category');
        $storeService->price = $request->input('price');
        $storeService->status = $request->input('status');
        $storeService->note = $request->input('note') ?? ' ';

        $storeService->save();

        return redirect('provider/services-list')
            ->with('notification', 'Added service successfully');
    }

    public function serviceEdit($id): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $editService = Service::find($id);

        $category = ServiceCategories::where('status', 1)
            ->get();

        return view('provider.services.edit', [
            'editService' => $editService,
            'category' => $category,
        ]);
    }

    public function serviceUpdate(Request $request, $id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $updateService = Service::findOrFail($id);

        $updateService->name = $request->input('name');
        $updateService->user_id = Auth::user()->id;
        $updateService->category_id = $request->input('category');
        $updateService->price = $request->input('price');
        $updateService->status = $request->input('status');
        $updateService->note = $request->input('note') ?? ' ';
        $updateService->save();

        return redirect("provider/services-edit/" . $id)
            ->with('notification', 'Update service successfully');
    }

    public function serviceDelete($id): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $deleteService = Service::findOrFail($id);
        $deleteService->delete();

        return redirect('provider/services-list')
            ->with('notification', 'Delete service successfully');
    }

    public function roomList()
    {
        $houses = House::where('user_id', Auth::id())->get();
        $rooms = Room::where('user_id', Auth::id())->get();

        $getDataRoom = $rooms->groupBy('house_id')->mapWithKeys(function ($groupedRooms, $houseId) use ($houses) {
            $house = $houses->find($houseId);
            $house_name = $house->name;

            $roomsData = $groupedRooms->map(function ($room) use ($houseId, $house_name) {
                $gender = ($room->rent_with == 1) ? 'Nam' : (($room->rent_with == 2) ? 'Nữ' : 'Nam & Nữ');
                return [
                    'house_id' => $houseId,
                    'house_name' => $house_name,
                    'room_id' => $room->id,
                    'room_number' => $room->numerical_order,
                    'room_name' => $room->number_room,
                    'room_price' => $room->price,
                    'room_height' => $room->height,
                    'room_width' => $room->width,
                    'max_people' => $room->maximum_number_of_people,
                    'gender' => $gender,
                ];
            });
            return [$houseId => $roomsData];
        });

        return view('provider.room.list', compact('getDataRoom'));
    }

    public function roomCreate()
    {
        $houses = House::where('user_id', Auth::id())
            ->get();

        return view('provider.room.create', compact('houses'));
    }

    public function roomStore(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $validated = $request->validate([
            'number_room' => 'required',
            'house' => 'required',
            'numerical_order' => 'required',
            'price' => 'required',
            'height' => 'required',
            'width' => 'required',
            'number_people' => 'required',
            'gender.*' => 'required|in:1,2',
        ]);

        $storeRoom = new Room();
        $storeRoom->user_id = Auth::id();
        $storeRoom->house_id = $validated['house'];
        $storeRoom->number_room = $validated['number_room'];
        $storeRoom->numerical_order = $validated['numerical_order'];
        $storeRoom->price = $this->convertNumber($validated['price']);
        $storeRoom->width = $this->convertNumber($validated['width']);
        $storeRoom->height = $this->convertNumber($validated['height']);
        $storeRoom->maximum_number_of_people = $validated['number_people'];
        if (in_array(1, $validated['gender']) && in_array(2, $validated['gender'])) {
            $storeRoom->rent_with = 3;
        } elseif (in_array(1, $validated['gender'])) {
            $storeRoom->rent_with = 1;
        } elseif (in_array(2, $validated['gender'])) {
            $storeRoom->rent_with = 2;
        }
        $storeRoom->description = $request->note;

        $storeRoom->save();

        return redirect('/provider/room-list')
            ->with('notification', 'Đã thêm phòng');
    }
}
