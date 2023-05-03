<?php

namespace App\Http\Controllers;

use App\LoaiphongModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoaiphongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaiphong = LoaiphongModel::where('chutro_id', Auth::user()->id)->get();
        return view('admin.loaiphong.index', ["loaiphong"=>$loaiphong]);
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
    public function store(Request $request)
    {
        $loaiphong = new LoaiphongModel();
        $loaiphong->chutro_id = Auth::user()->id;
        $loaiphong->ten = $request->ten;
        $loaiphong->danhmuc = $request->danhmuc;
        $loaiphong->tinhtrang = $request->tinhtrang;

        $loaiphong->save();
        return redirect('admin/loaiphong')->with('thongbao', 'thêm thành công loại phòng!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        LoaiphongModel::find($id)->delete();
        return redirect()->back()->with('thongbao', 'Đã xóa loại phòng và các phòng cùng thuộc loại phòng!');
    }

    public function tat($id)
    {
        $loai = LoaiphongModel::find($id);
        $loai->tinhtrang = 2;
        $loai->save();
        return redirect()->back()->with('thongbao', 'Đã tắt');
    }
    public function mo($id)
    {
        $loai = LoaiphongModel::find($id);
        $loai->tinhtrang = 1;
        $loai->save();
        return redirect()->back()->with('thongbao', 'Đã mở');
    }
}
