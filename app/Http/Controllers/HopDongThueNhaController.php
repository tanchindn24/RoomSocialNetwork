<?php

namespace App\Http\Controllers;

use App\DienBill;
use App\NuocBill;
use App\TblDienModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\ThanhToanModel;
use App\HopDongThueNhaModel;
use App\KhachThueModel;
use App\PhongTroModel;
use App\PhongChoThueModel;

class HopDongThueNhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_hopdong = HopDongThueNhaModel::where('chutro_id', Auth::user()->id)->get();

        return view('admin.hopdong.index', [
            "listhopdong"=>$list_hopdong,
        ]);
    }

    public function taohopdong($id)
    {
        $thanhtoan = ThanhToanModel::all();
        $phongtro = PhongTroModel::where('chutro_id', Auth::user()->id)->find($id);
        $list_khach = KhachThueModel::where('chutro_id', Auth::user()->id)->get();
        $list_khach2 = KhachThueModel::where('chutro_id', Auth::user()->id)->get();
        $list_khach3 = KhachThueModel::where('chutro_id', Auth::user()->id)->get();
        $list_khach4 = KhachThueModel::where('chutro_id', Auth::user()->id)->get();

        return view('admin.hopdong.taohopdong', [
            "thanhtoan"=>$thanhtoan,
            "phongtro"=>$phongtro,
            "listkhach"=>$list_khach,
            "listkhach2"=>$list_khach2,
            "listkhach3"=>$list_khach3,
            "listkhach4"=>$list_khach4,
        ]);
    }

    public function postdatahopdong($id, Request $request)
    {
        $json_hinhanhgttt = '';
        if ($request->hasFile('giaytotuythan'))
        {
            $array_imgcmnd = array();
            $inputfile = $request->file('giaytotuythan');
            foreach ($inputfile as $file_img)
            {
                $name = time() . rand(0,99) . $file_img->getClientOriginalName();
                $file_img->move('public/uploads/hopdong/giaytotuythan', $name);
                array_push($array_imgcmnd, $name);
            }
            $json_hinhanhgttt = json_encode($array_imgcmnd, JSON_FORCE_OBJECT);
        }
        else{
            $array_imgcmnd[] = "Error-upload-giaytotuythan";
            $json_hinhanhgttt = json_encode($array_imgcmnd, JSON_FORCE_OBJECT);
        }

        $json_dichvu = json_encode($request->dichvu, JSON_FORCE_OBJECT);

        $tthopdong = new HopDongThueNhaModel();
        $dienbill = new DienBill();
        $nuocbill = new NuocBill();
        $phongtro = PhongTroModel::find($id);

        $tthopdong->chutro_id = Auth::user()->id;
        $tthopdong->khachthue_id = $request->idkhachthue1;
        $tthopdong->khachthue_id_thuhai = $request->idkhachthue2;
        $tthopdong->khachthue_id_thuba = $request->idkhachthue3;
        $tthopdong->khachthue_id_thutu = $request->idkhachthue4;
        $tthopdong->phong_id = $id;
        $tthopdong->giathaydoi = $request->giathaydoi;
        $tthopdong->sodienbandau = $request->sodienbandau;
        $tthopdong->sonuocbandau = $request->sonuocbandau;
        $tthopdong->thanhtoan_id = $request->phuongthucthanhtoan;
        $tthopdong->tiencoc = $request->tiendatcoc;
        $tthopdong->tungay = $request->thoigianbatdau;
        $tthopdong->denngay = $request->thoigianketthuc;
        $tthopdong->dichvu = $json_dichvu;
        $tthopdong->hinhanh_gttt = $json_hinhanhgttt;

        $dienbill->khachthue_id = $request->idkhachthue1;
        $dienbill->sotruoc = $request->sodienbandau;

        $nuocbill->khachthue_id = $request->idkhachthue1;
        $nuocbill->sotruoc = $request->sonuocbandau;

        $phongtro->tinhtrang_id = 5;

        $tthopdong->save();
        $dienbill->save();
        $nuocbill->save();
        $phongtro->save();

        return redirect('admin/hopdong/')->with('thongbao', 'tạo hợp đồng thành công');
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
    public function store($id, Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show_hopdong = HopDongThueNhaModel::find($id);
        return view('admin.hopdong.banhopdong', [
            "chitiet"=>$show_hopdong,
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
        $thanhtoan = ThanhToanModel::all();
        $khachthue_id = HopDongThueNhaModel::where('id', $id)->where('chutro_id', Auth::user()->id)->value('khachthue_id');
        $khachthuephong = PhongChoThueModel::where('chutro_id', Auth::user()->id)->where('id', $khachthue_id)->first();
        $hopdong = HopDongThueNhaModel::find($id);
        return view('admin.hopdong.edit', [
            "thanhtoan"=>$thanhtoan,
            "khachthue_id"=>$khachthuephong,
            "hopdong"=>$hopdong,
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
        $json_dichvu = json_encode($request->dichvu, JSON_FORCE_OBJECT);

        $hopdong = HopDongThueNhaModel::find($id);
        $dienbill = new DienBill();
        $nuocbill = new NuocBill();

        $hopdong->chutro_id = Auth::user()->id;
        $hopdong->khachthue_id = $request->idkhachthue;
        $dienbill->khachthue_id = $request->idkhachthue;
        $nuocbill->khachthue_id = $request->idkhachthue;
        $hopdong->dichvu = $json_dichvu;
        $hopdong->sodienbandau = $request->sodienbandau;
        $dienbill->sotruoc = $request->sodienbandau;
        $hopdong->sonuocbandau = $request->sonuocbandau;
        $nuocbill->sotruoc = $request->sonuocbandau;
        $hopdong->thanhtoan_id = $request->phuongthucthanhtoan;
        $hopdong->tiencoc = $request->tiendatcoc;
        $hopdong->tungay = $request->tungay;
        $hopdong->denngay = $request->ngayhethan;

        $hopdong->save();
        $dienbill->save();
        $nuocbill->save();

        return redirect('admin/hopdong')->with('thongbao', 'tạo hợp đồng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        HopDongThueNhaModel::find($id)->delete();
        return redirect()->back()->with('thongbao', 'Đã xóa hợp đồng!');
    }
    public function inhopdong($id)
    {
        $show_hopdong = HopDongThueNhaModel::find($id);
        return view('admin.hopdong.inhopdong', [
            "chitiet"=>$show_hopdong,
            ]);
    }
}
