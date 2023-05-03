<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Motelroom;
use App\Categories;
use App\Reports;

class MotelController extends Controller
{
	public function SearchMotelAjax(Request $request){
		$getmotel = Motelroom::where([
			['district_id',$request->id_ditrict],
			['price','>=',$request->min_price],
			['price','<=',$request->max_price],
			['category_id',$request->id_category],
			['approve',1]])->get();
		$arr_result_search = array();
		foreach ($getmotel as $room) {
			$arrlatlng = json_decode($room->latlng,true);
			$arrImg = json_decode($room->images,true);
			$arr_result_search[] = ["id" =>$room->id,"lat"=> $arrlatlng[0],"lng"=> $arrlatlng[1],"title"=>$room->title,"address"=> $room->address,"image"=>$arrImg[0],"phone"=>$room->phone,"slug"=>$room->slug ];
		}
		return json_encode($arr_result_search);
	}

    public function SearchpolyAjax(Request $request){
        $getmotel = Motelroom::where([
            ['price','>=',$request->min_price],
            ['price','<=',$request->max_price],
            ['category_id',$request->id_category],
            ['approve',1]])->get();
        $arr_result_search = array();
        foreach ($getmotel as $room) {
            $arrlatlng = json_decode($room->latlng,true);
            $arrImg = json_decode($room->images,true);
            $arr_result_search[] = ["id" =>$room->id,"lat"=> $arrlatlng[0],"lng"=> $arrlatlng[1],"title"=>$room->title,"address"=> $room->address,"image"=>$arrImg[0],"phone"=>$room->phone, "slug"=>$room->slug, "price"=>$room->price, "category_id"=>$room->category_id];
        }
        return json_encode($arr_result_search);
    }
	
	public function user_del_motel($id){
		if (!Auth::check()) {
			return redirect('user/login');
		}
		else 
		{
			$getmotel = Motelroom::find($id);
			if(Auth::id() != $getmotel->user_id )
				return redirect('user/profile')->with('thongbao','Bạn không có quyền xóa bài đăng không phải là của bạn!');
			else
			{
				$getmotel->delete();
				return redirect('user/profile')->with('thongbao','Đã xóa bài đăng của bạn');
			}
		}
	}

	public function getMotelByCategoryId($id){
		$getmotel = Motelroom::where([['category_id',$id],['approve',1]])->paginate(3);
		$Categories = Categories::all();
		return view('home.category',['listmotel'=>$getmotel,'categories'=>$Categories]);
	}

	public function userReport($id,Request $request) {

	    $report = new Reports;
	    $report->user_id = Auth::user()->id;
	    $report->id_motelroom = $id;
	    $report->status = $request->baocao;
	    $report->save();
	    $getmotel = Motelroom::find($id);
		return redirect('phongtro/'.$getmotel->slug)->with('thongbao','Đã gửi yêu cầu đến chủ trọ');
	
	}
}
