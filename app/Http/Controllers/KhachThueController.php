<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\KhachThueModel;
use App\PhongTroModel;
use App\PhongChoThueModel;
use App\HopDongThueNhaModel;
use App\TinhThanhPho;
use App\QuanHuyen;
use App\XaPhuongThiTran;
use App\TamTruTamVangModel;

class KhachThueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_khachthue = KhachThueModel::where('chutro_id', Auth::user()->id)->get();
        return view('admin.khachthue.index', ['khachthue'=>$list_khachthue]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_phongtro = PhongtroModel::where('chutro_id', Auth::user()->id)->get();
        return view('admin.khachthue.create',[
        "phongtro"=>$list_phongtro,
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
        $json_imgcmnd = '';
        if ($request->hasFile('imgcmnd'))
        {
            $array_imgcmnd = array();
            $inputfile = $request->file('imgcmnd');
            foreach ($inputfile as $file_img)
            {
                $name = "cmnd2mat-" . date('mdH') . rand(0, 99) . ".jpg";
                $file_img->move('public/uploads/khachthue/cmnd', $name);
                array_push($array_imgcmnd, $name);
            }
            $json_imgcmnd = json_encode($array_imgcmnd, JSON_FORCE_OBJECT);
        }
        else{
            $array_imgcmnd[] = "Error-upload-imgcmnd";
            $json_imgcmnd = json_encode($array_imgcmnd, JSON_FORCE_OBJECT);
        }

        $json_imganhthe = '';
        if ($request->hasFile('imganhthe'))
        {
            $array_imganhthe = array();
            $inputfile = $request->file('imganhthe');
            foreach($inputfile as $file_img)
            {
                $name = "anhthe-" . date('mdH') . rand(0, 99) . ".jpg";
                $file_img->move('public/uploads/khachthue/anhthe34', $name);
                array_push($array_imganhthe, $name);
            }
            $json_imganhthe = json_encode($array_imganhthe, JSON_FORCE_OBJECT);
        }
        else{
            $array_imganhthe[] = 'Error-upload-imganhthe';
            $json_imganhthe = json_encode($array_imganhthe, JSON_FORCE_OBJECT);
        }

        $ttkhachhang = new KhachThueModel();

        $ttkhachhang->chutro_id = Auth::user()->id;
        $ttkhachhang->name = $request->tenkhach;
        $ttkhachhang->ngaysinh = $request->ngaysinh;
        $ttkhachhang->hokhau = $request->hokhau;
        $ttkhachhang->cmnd = $request->cmnd;
        $ttkhachhang->ngaycapcmnd = $request->ngaycap;
        $ttkhachhang->noicapcmnd = $request->noicap;
        $ttkhachhang->sdt = $request->sdt;
        $ttkhachhang->hinhanhcmnd = $json_imgcmnd;
        $ttkhachhang->hinhanhkhach = $json_imganhthe;
        $ttkhachhang->save();
        return redirect('admin/khachthue/create')->with('thongbao', 'đã thêm dữ liệu khách hàng');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $thongtin_khach = KhachThueModel::where('chutro_id', Auth::user()->id)->find($id);
//        dd($thongtin_khach);
        return view('admin.khachthue.thongtinkhach', [
            'khach'=>$thongtin_khach,
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
        //
    }

    public function huyhoatdong($id)
    {
        $hoatdong = KhachThueModel::find($id);
        $hoatdong->tinhtrang = 2;
        $hoatdong->save();

        return redirect('admin/khachthue')->with('thongbao', 'đã hủy hoạt động khách');
    }

    public function mohoatdong($id)
    {
        $hoatdong = KhachThueModel::find($id);
        $hoatdong->tinhtrang = 1;
        $hoatdong->save();

        return redirect('admin/khachthue')->with('thongbao', 'đã mở hoạt động khách');
    }

    public function tamtrutamvang()
    {
        $list_tamtru = TamTruTamVangModel::where('chutro_id', Auth::user()->id)->get();
        return view('admin.khachthue.tamtrutamvang', [
            "listtamtru"=>$list_tamtru,
        ]);
    }
    public function khaibaotamtru()
    {
        $list_khach = KhachThueModel::where('chutro_id', Auth::user()->id)->get();
        $list_thanhpho = TinhThanhPho::all();

        return view('admin.khachthue.khaibaotamtru', [
            "listkhach"=>$list_khach,
            "listthanhpho"=>$list_thanhpho,
        ]);
    }
    public function postdatatamtru(Request $request)
    {
        $tamtrutamvang = new TamTruTamVangModel();
        $tamtrutamvang->chutro_id = Auth::user()->id;
        $tamtrutamvang->khachthue_id = $request->idkhachthue;
        $tamtrutamvang->chuho = $request->tenchuho;
        $tamtrutamvang->sdtchuho = $request->sdtchuho;
        $tamtrutamvang->thoigian = $request->thoigiantamtru;
        $tamtrutamvang->sonha = $request->sonha;
        $tamtrutamvang->tinhthanh = $request->tinhthanh;
        $tamtrutamvang->quanhuyen = $request->quanhuyen;
        $tamtrutamvang->xaphuong = $request->xaphuong;

        $tamtrutamvang->save();

        return redirect('khachthue/khaibaotamtru')->with('thongbao', 'đã khai báo thành công');
    }
    public function xuattamtru($id)
    {
        $info_tamtru = TamTruTamVangModel::where('chutro_id', Auth::user()->id)->find($id);
        return view('admin.khachthue.xuattamtru', [
            "tamtru"=>$info_tamtru
        ]);
    }
    public function get_data_diachi(Request $request)
    {
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action']=="thanhpho"){
                $select_quanhuyen = QuanHuyen::where('matp', $data['ma_id'])->orderby('maqh', 'ASC')->get();
                    $output.='<option>chọn quận huyện</option>';
                foreach($select_quanhuyen as $quanhuyen){
                    $output.='<option value="'.$quanhuyen->maqh.'">'.$quanhuyen->name.'</option>';
                }
            }else{
                $select_xaphuong = XaPhuongThiTran::where('maqh', $data['ma_id'])->orderby('xaid', 'ASC')->get();
                    $output.='<option>chọn xã phường</option>';
                foreach($select_xaphuong as $xaphuong){
                    $output.='<option value="'.$xaphuong->xaid.'">'.$xaphuong->name.'</option>';
                } 
            }
        }
        echo $output;
    }
}
