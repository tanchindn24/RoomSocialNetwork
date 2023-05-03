<?php

namespace App\Http\Controllers;

use App\LoaiphongModel;
use App\PhongChoThueModel;
use App\TinhtrangPhongModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use App\PhongTroModel;
use App\Motelroom;
use App\KhachThueModel;

class PhongTroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaiphong = LoaiphongModel::where('chutro_id', Auth::user()->id)->where('tinhtrang', 1)->get();
        $tinhtrang = TinhtrangPhongModel::all();
        $list_phongtro = PhongTroModel::where('chutro_id', Auth::user()->id)->orderBy('tenphong', 'ASC')->simplePaginate(10);

        $phongtrong = PhongTroModel::where('chutro_id', Auth::user()->id)->where('tinhtrang_id', 1)->count();
        $phongsuachua = PhongTroModel::where('chutro_id', Auth::user()->id)->where('tinhtrang_id', 2)->count();
        $phongdondep = PhongTroModel::where('chutro_id', Auth::user()->id)->where('tinhtrang_id', 3)->count();
        $phongdatcoc = PhongTroModel::where('chutro_id', Auth::user()->id)->where('tinhtrang_id', 4)->count();
        $phongchothue = PhongTroModel::where('chutro_id', Auth::user()->id)->where('tinhtrang_id', 5)->count();
        $phongkhoa = PhongTroModel::where('chutro_id', Auth::user()->id)->where('tinhtrang_id', 6)->count();

        $phong_lam_hop_dong = PhongtroModel::where('chutro_id', Auth::user()->id);

        
        return view('admin.phongtro.index' , [
            "loaiphong"=>$loaiphong,
            "tinhtrang"=>$tinhtrang,
            "listphongtro"=>$list_phongtro,
            "trong"=>$phongtrong,
            "suachua"=>$phongsuachua,
            "dondep"=>$phongdondep,
            "datcoc"=>$phongdatcoc,
            "chothue"=>$phongchothue,
            "khoa"=>$phongkhoa,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loaiphong = LoaiphongModel::where('chutro_id', Auth::user()->id)->where('tinhtrang', 1)->get();
        $tinhtrang = TinhtrangPhongModel::all();
        return view('admin.phongtro.create', [
            "loaiphong"=>$loaiphong,
            "tinhtrang"=>$tinhtrang,
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
        
        // $maphong = "PT" . "-" . date('dis');

        $phongtro = new PhongTroModel();
        $phongtro->chutro_id = Auth::user()->id;
        $phongtro->tenphong = $request->tenphong;
        $phongtro->diachi = $request->diachiphong;
        $phongtro->gia = $request->giaphong;
        $phongtro->dientich = $request->dientichphong;
        $phongtro->tiendien = $request->tiendien;
        $phongtro->tiennuoc = $request->tiennuoc;
        $phongtro->loaiphong_id = $request->loaiphong;
        $phongtro->tinhtrang_id = $request->tinhtrang;

        $phongtro->save();
        return redirect('admin/phongtro')->with('thongbao','phòng đã được tạo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaiphong = LoaiphongModel::where('chutro_id', Auth::user()->id)->where('tinhtrang', 1)->get();
        $phongtro = PhongTroModel::find($id);
        return view('admin.phongtro.edit', [
            "phongtro"=>$phongtro,
            "loaiphong"=>$loaiphong
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
        $phongtro = PhongTroModel::find($id);

        $phongtro->chutro_id = Auth::user()->id;
        $phongtro->tenphong = $request->tenphong;
        $phongtro->diachi = $request->diachiphong;
        $phongtro->gia = $request->giaphong;
        $phongtro->dientich = $request->dientichphong;
        $phongtro->tiendien = $request->tiendien;
        $phongtro->tiennuoc = $request->tiennuoc;
        $phongtro->loaiphong_id = $request->loaiphong;
        $phongtro->save();

        return redirect('admin/phongtro')->with('thongbao', 'thay đổi thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PhongTroModel::find($id)->delete();
        return redirect()->back()->with('thongbao', 'Đã xóa phòng!');
    }
    public function ptrong($id) {
        $room = PhongTroModel::find($id);
        $room->tinhtrang_id = 1;
        $room->save();
        return redirect('admin/phongtro/')->with('thongbao','Đã thay đổi');
      }
  
    public function psuachua($id) {
        $room = PhongTroModel::find($id);
        $room->tinhtrang_id = 2;
        $room->save();
        return redirect('admin/phongtro/')->with('thongbao','Đã thay đổi');
      }
    
    public function pdondep($id) {
        $room = PhongTroModel::find($id);
        $room->tinhtrang_id = 3;
        $room->save();
        return redirect('admin/phongtro/')->with('thongbao', 'Đã thay đổi');
    }
    public function pdatcoc($id) {
        $room = PhongTroModel::find($id);
        $room->tinhtrang_id = 4;
        $room->save();
        return redirect('admin/phongtro/')->with('thongbao', 'Đã thay đổi');
    }
    
    public function pchothue($id) {
        $room = PhongTroModel::find($id);
        $room->tinhtrang_id = 5;
        $room->save();
        return redirect('admin/phongtro/')->with('thongbao', 'Đã thay đổi');
    }
    public function pkhoa($id) {
        $room = PhongTroModel::find($id);
        $room->tinhtrang_id = 6;
        $room->save();
        return redirect('admin/phongtro/')->with('thongbao', 'Đã thay đổi');
    }
}
