<?php

namespace App\Http\Controllers;

use App\Models\MBaiviet;
use App\Models\MDanhmuc;
use App\Models\Mloaiphong;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CChutro extends Controller
{
    public function chutro_danh_muc()
    {
        $list_danhmuc = MDanhmuc::all();
        return view('chutro.baiviet.danhmuc', [
            "list"=>$list_danhmuc
        ]);
    }

    public function chutro_tindang()
    {
        $list_baiviet = MBaiviet::where('chutro_id', Auth::user()->id)->get();
        $list_danhmuc = MDanhmuc::all();
        return view('chutro.baiviet.tinchothue.baiviet', [
            "list"=>$list_baiviet,
            "list_danhmuc"=>$list_danhmuc,
        ]);
    }
//    Loại phòng
    public function danh_sach()
    {
        $list_loaiphong = Mloaiphong::where('chutro_id', Auth::user()->id)->get();
        return view('chutro.loaiphong.loaiphong',[
            "list"=>$list_loaiphong,
        ]);
    }
    public function loaiphong_add(Request $request)
    {
        $loai_phong = new Mloaiphong();
        $loai_phong->chutro_id = Auth::user()->id;
        $loai_phong->ten = $request->ten;
        $loai_phong->mota = $request->mota;
        $loai_phong->tinhtrang = $request->tinhtrang;

        $loai_phong->save();
        return redirect(RouteServiceProvider::LOAIPHONG)->with('success','Tạo thành công!');

    }
    public function loaiphong_active($id)
    {
        $loaiphong = Mloaiphong::find($id);
        $loaiphong->tinhtrang = 1;
        $loaiphong->save();
        return redirect()->back()->with('info','Đã mở!');
    }
    public function loaiphong_unactive($id)
    {
        $loaiphong = Mloaiphong::find($id);
        $loaiphong->tinhtrang = 2;
        $loaiphong->save();
        return redirect()->back()->with('warning','Đã khóa!');
    }
    public function loaiphong_edit($id)
    {
        $loaphong_findid = Mloaiphong::where('chutro_id', Auth::user()->id)->where('id', $id)->first();
        $list_loaiphong = Mloaiphong::where('chutro_id', Auth::user()->id)->get();
        return view('chutro.loaiphong.editloaiphong', [
            "list"=>$list_loaiphong,
            "find_id"=>$loaphong_findid,
        ]);
    }
    public function loaiphong_edit_post(Request $request, $id)
    {
        $loai_phong = Mloaiphong::find($id);
        $loai_phong->chutro_id = Auth::user()->id;
        $loai_phong->ten = $request->ten;
        $loai_phong->mota = $request->mota;
        $loai_phong->tinhtrang = $request->tinhtrang;

        $loai_phong->save();
        return redirect(RouteServiceProvider::LOAIPHONG)->with('success','Đã thay đổi');
    }
    public function loaiphong_delete($id)
    {
        $loaphong_findid = Mloaiphong::where('chutro_id', Auth::user()->id)->where('id', $id)->delete();
        return redirect(RouteServiceProvider::LOAIPHONG)->with('error','Xóa thành công');
    }
}
