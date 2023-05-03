<?php

namespace App\Http\Controllers;

use App\DienBill;
use App\HopDongThueNhaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\DienModel;
use App\PhongTroModel;

class DienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hopdong = HopDongThueNhaModel::where('chutro_id', Auth::user()->id)->get();
        return view('admin.dien.index', [
            "hopdong"=>$hopdong,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

        $dienbill = DienBill::where('khachthue_id', HopDongThueNhaModel::find($id)->khachthue_id)->first();
        $sodien = new DienModel();

        $sodien->chutro_id = Auth::user()->id;
        $sodien->hopdong_id = $id;
        $sodien->sodiencu = $request->sodientruoc;
        $sodien->sodienmoi = $request->sodienmoi;
        $dienbill->sotruoc = $request->sodienmoi;
        $sodien->ngaynhap = $request->ngaynhap;
        $sodien->giadien = $request->giadien;
        $sodien->save();
        $dienbill->save();
        return redirect('admin/dientro')->with('thongbao', 'Nhập số điện cho khách thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_dien = HopDongThueNhaModel::find($id);
        $dien = DienModel::where('hopdong_id', $id)->get();
        return view('admin.dien.thongtin', [
            "dien"=>$dien
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
        $id_nhapsodien = HopDongThueNhaModel::find($id);
        $dientruoc = DienBill::where('khachthue_id', HopDongThueNhaModel::find($id)->khachthue_id)->first();
        return view('admin.dien.nhapsodien', [
            "chitiet"=>$id_nhapsodien,
            "sodientruoc"=>$dientruoc
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
