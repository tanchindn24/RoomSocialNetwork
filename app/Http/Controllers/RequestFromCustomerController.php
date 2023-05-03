<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Motelroom;
use App\Categories;
use App\User;
use App\RequestFromCustomerModel;

class RequestFromCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_yeucau = RequestFromCustomerModel::where('id_usermotelroom', Auth::user()->id)->get();
        return view('admin.yeucaukhachhang.index', [
            'yeucau' => $list_yeucau,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $user_motel)
    {
        $yeucau = new RequestFromCustomerModel();

        $yeucau->user_id = Auth::user()->id;
        $yeucau->phone_user = Auth::user()->phone;
        $yeucau->email_user = Auth::user()->email;
        $yeucau->id_motelroom = $id;
        $yeucau->id_usermotelroom = $user_motel;
        $yeucau->status = $request->yeucau;
        $yeucau->save();
        $getmotel = Motelroom::find($id);
        
        return redirect('phongtro/'.$getmotel->slug)->with('thongbao', 'đã gửi yêu cầu của bạn đến chủ trọ');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
