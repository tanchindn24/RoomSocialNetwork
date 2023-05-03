<?php

namespace App\Http\Controllers;

use App\Models\Mloaiphong;
use App\Models\MNhatro;
use App\Models\MPhongtro;
use App\Models\MQuanhuyen;
use App\Models\MThanhpho;
use App\Models\MXaphuong;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\isEmpty;

class CPhongtro extends Controller
{
    function strToNum($string) {
        $string = str_ireplace('.','',$string);
        return (int)$string;
    }

    public function danh_sach() {
        $list_nhatro = MNhatro::where('chutro_id', Auth::user()->id)->get();
        $loaiphong = Mloaiphong::where('chutro_id', Auth::user()->id)->where('tinhtrang', 1)->get();
        $thanhpho['data_thanhpho'] = MThanhpho::orderby("name", "asc")->select('matp','name')->get();

        if ($loaiphong->isEmpty()) {
            return redirect(RouteServiceProvider::LOAIPHONG)->with('info','Thêm loại phòng để tiếp tục');
        }elseif ($list_nhatro->isEmpty()) {
            return view('chutro.phongtro.phongtro', [
                "loaiphong"=>$loaiphong,
                "datathanhpho"=>$thanhpho,
            ]);
        }
        else {
            $first_nhatro = MNhatro::where('chutro_id', Auth::user()->id)->first();
            $list_phongtro = MPhongtro::where('nhatro_id', $first_nhatro->id)->get();
            return view('chutro.phongtro.phongtro_list', [
                "dsnhatro"=>$list_nhatro,
                "nhatro"=>$first_nhatro,
                "dsphong"=>$list_phongtro,
            ]);
        }
    }

    function getQuanhuyen($matp = 0) {
        // tim quan huyen theo thanh pho
        $quanhuyenData['data_quanhuyen'] = MQuanhuyen::orderby("name", "asc")->select('maqh', 'name')->where('matp', $matp)->get();
        return response()->json($quanhuyenData);
    }

    function getXaphuong($maqh = 0) {
        // tim xa phuong theo quan huyen
        $xaphuongData['data_xaphuong'] = MXaphuong::orderby("name", "asc")->select('maxp', 'name')->where('maqh', $maqh)->get();
        return response()->json($xaphuongData);
    }

    public function phongtro_add(Request $request) {
        $address_component = $request->address_component;
        $setting = $request->setting;
        $nhatro_id = MNhatro::insertGetId([
            'chutro_id'=> Auth::user()->id,
            'loaiphong_id' => $request->category,
            'ten_nhatro'=>$request->name,
            'so_tang'=>$request->count_floor,
            'so_phong'=>$request->room_total,
            'tinhthanh_id' => $address_component['province_id'],
            'quanhuyen_id'=> $address_component['district_id'],
            'xaphuong_id'=>$address_component['ward_id'],
            'dia_chi'=>$address_component['detail_address'],
            'created_at' => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
            'updated_at' => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
        ]);

        // chia phong theo tang va them phong
        $so_tang = $request->count_floor;
        $so_phong = $this->strToNum($request->room_total);
        $x = ceil($so_phong/$so_tang);
        $phong = 1;
        for ($tang=1;$tang<=$so_tang;$tang++) {
            for ($count=1; $count<=$x && $phong<=$so_phong; $phong++, $count++) {
                MPhongtro::insert([
                    'nhatro_id' => $nhatro_id,
                    'ten_tang' => "Tầng ".$tang,
                    'ten_phong' => "Phòng ".$phong,
                    'dien_tich'=> $request->area,
                    'gia'=> $request->room_amount,
                    'so_nguoi'=>$request->max_member,
                    'dv_dien'=>$setting['price_item_ele'],
                    'dv_nuoc'=>$setting['price_item_water'],
                    'dv_rac'=>$setting['price_item_trash'],
                    'dv_internet'=>$setting['price_item_wifi'],
                    'ngaylap_hoadon'=>$request->circle_order,
                    'han_dongtien'=>$request->deadline_bill,
                    'tinhtrang' => 1,
                    'created_at' => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                    'updated_at' => \Carbon\Carbon::now('Asia/Ho_Chi_Minh'),
                ]);
            }
        }
    }

}
