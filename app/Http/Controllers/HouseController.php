<?php

namespace App\Http\Controllers;

use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HouseController extends Controller
{
    public function houseCreate(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $provinces = DB::table('provinces')->get();

        return view('provider.house.create', [
            'provinces' => $provinces,
        ]);
    }

    public function houseStore(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $validated = $request->validate([
            'name' => 'required',
            'provinces' => 'required',
            'districts' => 'required',
            'wards' => 'required',
            'address' => 'required'
        ]);

        $storeHouse = new House();
        $storeHouse->user_id = Auth::id();
        $storeHouse->name = $validated['name'];
        $storeHouse->province_code = $validated['provinces'];
        $storeHouse->district_code = $validated['districts'];
        $storeHouse->ward_code = $validated['wards'];
        $storeHouse->address = $validated['address'];

        $storeHouse->save();

        return redirect('/provider/room-list')
            ->with('notification', 'Thêm nhà thành công');
    }
}
