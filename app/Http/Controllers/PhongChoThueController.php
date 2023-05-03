<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\PhongChoThueModel;
use App\PhongTroModel;
use App\KhachThueModel;

class PhongChoThueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_phongvakhach = PhongChoThueModel::where('chutro_id', Auth::user()->id)->get();
        return view('admin.phongchothue.index', [
            "listkhachphong"=>$list_phongvakhach,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_phong = PhongTroModel::where('chutro_id', Auth::user()->id)->where('tinhtrang_id', '1')->get();
        $list_khach = KhachThueModel::where('chutro_id', Auth::user()->id)->get();
//        dd($list_phong);
        return view('admin.phongchothue.create', [
            "listphong"=>$list_phong,
            "listkhach"=>$list_khach,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phongthue = new PhongChoThueModel();

        $phongthue->chutro_id = Auth::user()->id;
        $phongthue->khachthue_id = $request->khachone;
        $phongthue->khachthue2_id = $request->khachtwo;
        $phongthue->khachthue3_id = $request->khachthree;
        $phongthue->phongthue_id = $request->phongtro;

        $phongthue->save();
        return redirect('admin/phongchothue/create')->with('thongbao', 'đã thêm khách thuê phòng');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list_phongvakhach = PhongChoThueModel::where('chutro_id', Auth::user()->id)->where('id',$id)->first();
        $giathaydoi = GiakhacModel::where('phong_id', PhongChoThueModel::find($id)->phongthue_id)->first();

        return view('admin.phongchothue.chitiet', [
            "khachthuephong"=>$list_phongvakhach,
            "giathaydoi"=>$giathaydoi
        ]);
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
        PhongChoThueModel::find($id)->delete();
        return redirect()->back()->with('thongbao', 'Đã xóa phòng thuê thành công!');
    }
}
