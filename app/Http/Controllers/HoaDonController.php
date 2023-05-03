<?php

namespace App\Http\Controllers;

use App\DienModel;
use App\NuocModel;
use App\HopDongThueNhaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\HoaDonModel;

class HoaDonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_hoadon = HoaDonModel::where('chutro_id', Auth::user()->id)->get();
        return view('admin.hoadon.index', [
            "lshoadon"=>$list_hoadon,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $in_hoadon = HoaDonModel::where('chutro_id', Auth::user()->id)->find($id);
        return view('admin.hoadon.inhoadon', [
            "inhoadon"=>$in_hoadon,
        ]);
    }
    public function inhoadon($id)
    {
        $in_banhoadon = HoaDonModel::where('chutro_id', Auth::user()->id)->find($id);
        return view('admin.hoadon.hoadon', [
            "inbanhoadon"=>$in_banhoadon,
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
        $hoadon = HopDongThueNhaModel::find($id);
        return view('admin.hoadon.create', [
            "hopdong"=>$hoadon,
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

    public function taohoadon($id) 
    {
        $id_hopdong = HopDongThueNhaModel::find($id);
        $tien_dien = DienModel::where('chutro_id', Auth::user()->id)->where('hopdong_id', $id)->get();
        $tien_nuoc = NuocModel::where('chutro_id', Auth::user()->id)->where('hopdong_id', $id)->get();

        return view('admin.hoadon.taohoadon', [
            'hopdong'=>$id_hopdong,
            'tiendien'=>$tien_dien,
            'tiennuoc'=>$tien_nuoc,
        ]);
    }

    public function postdatahoadon(Request $request, $id) 
    {
        $id_hopdong = HopDongThueNhaModel::find($id);
        $hoadon = new HoaDonModel();

        $hoadon->chutro_id = Auth::user()->id;
        $hoadon->hopdong_id = $id;
        $hoadon->tien_dien = $request->tiendien;
        $hoadon->tien_nuoc = $request->tiennuoc;
        $hoadon->tien_dich_vu_khac = $request->tiendichvu;
        $hoadon->ghichu = $request->ghichu;
        $hoadon->ngaytao = $request->ngaytao;

        $hoadon->save();
        
        return redirect('admin/hoadon')->with('thongbao', 'Đã tạo hóa đơn của ' . $id_hopdong->phongtro->tenphong . ' thành công');
    }
}
