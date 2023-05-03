<?php

namespace App\Http\Controllers;

use App\Models\MBaiviet;
use App\Models\MChutro;
use App\Models\MDanhmuc;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function login_admin()
    {
        return view('admin.dangnhap');
    }
    public function register_admin()
    {
        return view('admin.dangky');
    }
    public function index()
    {
        return view('chutro.dashboard');
    }
    public function addashboard()
    {
        return view('admin.dashboard');
    }
    public function profile($id)
    {
        $info_account = User::where('id', $id)->first();
        return view('admin.profile', [
            "info"=>$info_account,
        ]);
    }
    public function changes_profile(Request $request, $id)
    {
        $request->validate([
            'txt_name'=>'required',
            'txt_birthday'=>'required|unique:tbl_user,ngay_sinh',
            'txt_phone'=>'required',
            'txt_cccd'=>'required|unique:tbl_user,cccd',
            'txt_ngaycap'=>'required|unique:tbl_user,ngay_cap_cccd',
            'txt_noicap'=>'required|unique:tbl_user,noi_cap_cccd',
            'txt_location'=>'required|unique:tbl_user,dia_chi',
        ],[
            'txt_name.required'=>'Bạn chưa nhập đủ thông tin tên',
            'txt_birthday'=>'Bạn chưa cập nhật ngày sinh',
            'txt_phone'=>'Bạn chưa cập nhật số điện thoại',
            'txt_cccd'=>'Bạn chưa cập nhật cccd',
            'txt_ngaycap'=>'Bạn chưa cập nhật ngày cấp cccd',
            'txt_noicap'=>'Bạn chưa cập nhật nơi cấp cccd',
            'txt_location'=>'Bạn chưa cập nhật địa chỉ',
        ]);

        if (Auth::user()->id == $id) {
            $user = User::find($id);
            $user->name = $request->txt_name;
            $user->ngay_sinh = $request->txt_birthday;
            $user->dia_chi = $request->txt_location;
            $user->phone = $request->txt_phone;
            $user->cccd = $request->txt_cccd;
            $user->ngay_cap_cccd = $request->txt_ngaycap;
            $user->noi_cap_cccd = $request->txt_noicap;
            $user->save();
            return redirect()->back()->with('success', 'Cập nhật thông tin thành công');
        } else {
            return redirect()->back()->with('error', 'Không đúng thông tin');
        }

    }

//    Danh muc & bai viet
    public function danh_muc()
    {
        $list_danhmuc = MDanhmuc::all();
        return view('admin.danhmuc.danhmuc', [
            "list"=>$list_danhmuc
        ]);
    }
    public function danh_muc_add(Request $request)
    {
        $the_loai = new MDanhmuc();
        $the_loai->loai = $request->loai;
        $the_loai->tinhtrang = $request->tinhtrang;

        $the_loai->save();
        return Redirect::back()->with('success','Thêm thành công!');
    }
    public function danh_muc_mo($id)
    {
        $danhmuc = MDanhmuc::find($id);
        $danhmuc->tinhtrang = 1;
        $danhmuc->save();
        return Redirect::back()->with('success','Đã mở!');
    }
    public function danh_muc_khoa($id)
    {
        $danhmuc = MDanhmuc::find($id);
        $danhmuc->tinhtrang = 2;
        $danhmuc->save();
        return Redirect::back()->with('warning','Đã khóa!');
    }
    public function danh_muc_delete($id)
    {
        $danhmuc = MDanhmuc::find($id)->delete();
        return Redirect::back()->with('success','Đã xóa!');
    }
    public function bai_viet()
    {
        $list_baiviet = MBaiviet::all();
        $list_danhmuc = MDanhmuc::all();
        $list_chutro = User::where('roles', 2)->get();
        return view('admin.baiviet.baiviet', [
            "list_baiviet"=>$list_baiviet,
            "list_danhmuc"=>$list_danhmuc,
            "list_chutro"=>$list_chutro
        ]);
    }
    public function khoa_baiviet($id)
    {
        $find_baiviet = MBaiviet::find($id);
        $find_baiviet->trang_thai = 2;
        $find_baiviet->save();
        return Redirect::back()->with('success', 'Đã khóa bài viết!');
    }
    public function xacminh_baiviet($id)
    {
        $find_baiviet = MBaiviet::find($id);
        $find_baiviet->trang_thai = 1;
        $find_baiviet->save();
        return Redirect::back()->with('success', 'Đã xác minh bài viết!');
    }
    public function danhsach_chutro()
    {
        $account_chutro = User::where('roles', 2)->get();
        return view('admin.account.chutro', [
            "account_chutro"=>$account_chutro,
        ]);
    }
    public function danhsach_khachthue()
    {
        $account_khach = User::where('roles', 3)->get();
        return view('admin.account.khachthue', [
            "account_khach"=>$account_khach,
        ]);
    }
}
