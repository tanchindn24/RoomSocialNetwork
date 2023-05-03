<?php

namespace App\Http\Controllers;

use App\Models\MBaiviet;
use App\Models\MDanhmuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CBaiviet extends Controller
{
    function tindang()
    {
        $list_baiviet = MBaiviet::where('trang_thai', 1)->get();
        return view('home.tindang', [
            "list"=>$list_baiviet
        ]);
    }
    function dangtin()
    {
        $list_danhmuc = MDanhmuc::all();
        return view('home.dangtin', [
            "list"=>$list_danhmuc
        ]);
    }
    function post_dangtin(Request $request)
    {
        $request->validate([
            'tieude'=>'required',
            'sodienthoai'=>'required',
            'dientich'=>'required',
            'gia'=>'required',
            'danhmuc'=>'required',
            'quanhuyen'=>'required',
            'diachi'=>'required',
            'mota'=>'required',
        ],
        [
            'tieude.required'=>'Nhập tiêu đề bài viết',
            'sodienthoai.required'=>'Nhập số điện thoại',
            'dientich.required'=>'Diện tích không được để trống',
            'gia.required'=>'Giá không được để trống',
            'danhmuc.required'=>'Chọn danh mục cho bài viết',
            'quanhuyen.required'=>'Bạn chưa chọn quận huyện',
            'diachi.required'=>'Địa chỉ không được để trống',
            'mota.required'=>'Mô tả không được để trống',
        ]);
        //lay data hinh anh va convert json
        $json_check_imgs = "";
        if ($request->hasFile('hinhanh'))
        {
            $array_imgs = array();
            $inputfile = $request->file('hinhanh');
            foreach ($inputfile as $file_imgs)
            {
                $namefile = time().$file_imgs->getClientOriginalName();
                while (file_exists('public/assets/front-end/imgs/baiviet'.$namefile))
                {
                    $namefile = time().$file_imgs->getClientOriginalName();
                }
                $array_imgs[] = $namefile;
                $file_imgs->move('public/assets/front-end/imgs/baiviet', $namefile);
            }
            $json_check_imgs = json_encode($array_imgs, JSON_FORCE_OBJECT);
        } else {
            $array_imgs[] = 'no-images-baiviet.jpg';
            $json_check_imgs = json_encode($array_imgs, JSON_FORCE_OBJECT);
        }
// lay data tien ich va convert json
        $json_check_tienich = json_encode($request->tienich, JSON_FORCE_OBJECT);

        $baiviet = new MBaiviet();
        $baiviet->chutro_id = Auth::user()->id;
        $baiviet->trang_thai = 2;
        $baiviet->tieu_de = $request->tieude;
        $baiviet->so_dien_thoai = $request->sodienthoai;
        $baiviet->gia = $request->gia;
        $baiviet->dien_tich = $request->dientich;
        $baiviet->dia_chi = $request->diachi;
        $baiviet->danhmuc_id = $request->danhmuc;
        $baiviet->noi_dung = $request->mota;
        $baiviet->tienich = $json_check_tienich;
        $baiviet->hinh_anh = $json_check_imgs;

        $baiviet->save();
        return Redirect::back()->with('success', 'đăng thành công! bài viết đang được kiểm duyệt');

    }
    function detail($slug)
    {
        $slug_baiviet = MBaiviet::where('trang_thai', 1)->where('slug', $slug)->first();
        $list_baiviet = MBaiviet::where('trang_thai', 1)->take(4)->get();
        $list_baiviet_noibat = MBaiviet::where('trang_thai', 1)->limit(7)->orderBy('luot_xem','desc')->take(5)->get();
        $slug_baiviet->luot_xem = $slug_baiviet->luot_xem +1;
        $slug_baiviet->save();
        return view('home.detail', [
            "info"=>$slug_baiviet,
            "list"=>$list_baiviet,
            "baiviet_noibat"=>$list_baiviet_noibat,
        ]);
    }
    function search(Request $request) {
        $address = $_GET['diachi'];
        return response()->json(MBaiviet::where('dia_chi', "like", "%".$address."%")->where('trang_thai', 1)->get());
    }
    function show_result() {

    }
}

