<?php

namespace App\Http\Controllers;

use App\HopDongThueNhaModel;
use App\NuocBill;
use App\NuocModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NuocController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nuochopdong = HopDongThueNhaModel::where('chutro_id', Auth::user()->id)->get();
        return view('admin.nuoc.index', [
            'nuoc'=>$nuochopdong
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
    public function store(Request $request, $id)
    {
        $gethopdong = HopDongThueNhaModel::find($id);

        $sonuoc = new NuocModel();
        $nuocbill = NuocBill::where('khachthue_id', HopDongThueNhaModel::find($id)->khachthue_id)->first();

        $sonuoc->chutro_id = Auth::user()->id;
        $sonuoc->hopdong_id = $id;
        $sonuoc->sonuoccu = $request->sonuoctruoc;
        $sonuoc->sonuocmoi = $request->sonuocmoi;
        $nuocbill->sotruoc = $request->sonuocmoi;
        $sonuoc->gianuoc = $request->gianuoc;
        $sonuoc->ngaynhap = $request->ngaynhap;

        $sonuoc->save();
        $nuocbill->save();

        return redirect('admin/nuoctro')->with('thongbao', 'Nhập số nước cho khách thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_nuoc = HopDongThueNhaModel::find($id);
        $nuoc = NuocModel::where('hopdong_id', $id)->get();
        return view('admin.nuoc.thongtin', [
            "nuoc"=>$nuoc
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
        $nuoc = HopDongThueNhaModel::find($id);
        $sonuoc = NuocBill::where('khachthue_id', HopDongThueNhaModel::find($id)->khachthue_id)->first();
        return view('admin.nuoc.nhapsonuoc', [
            "chitiet"=>$nuoc,
            "sonuoctruoc"=>$sonuoc
        ]);
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
