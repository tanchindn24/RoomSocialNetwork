<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\District;
use App\Categories;
use App\Motelroom;
use DB;
use DateTime;
class UserController extends Controller
{
    public function guibinhluan(Request $request){
        $request->validate([
                'txtbinhluan' => 'required'
            ],
            [
                'txtbinhluan.required' => 'Bạn không thể gửi bình luận trống!'
            ]);
        $now= new DateTime;
        $id = DB::table('comment')->insertGetId(
            ['content' => $request->txtbinhluan, 'user_id' => auth::user()->id, 'room_id' => $request->room_id, 'created_at'=>$now]

        );
        return back();
    }

	/* Register */
   	public function get_register(){
         $categories = Categories::all();
   		return view('home.register',['categories'=>$categories]);
   	}

   	public function post_register(Request $req){
   		
   		$req->validate([
   			'txtuser' => 'required|unique:users,username',
   			'txtmail' => 'required|email|unique:users,email',
   			'txtpass' => 'required|min:6',
   			'txt-repass' => 'required|same:txtpass',
   			'txtname' => 'required'
   		],[
   			'txtuser.required' => 'Vui lòng nhập tài khoản',
   			'txtuser.unique' => 'Tài khoản đã tồn tại trên hệ thống',
   			'txtmail.unique' => 'Email đã tồn tại trên hệ thống',
   			'txtmail.required' => 'Vui lòng nhập Email',
   			'txtpass.required' => 'Vui lòng nhập mật khẩu',
   			'txtpass.min' => 'Mật khẩu phải lớn hơn 6 kí tự',
   			'txt-repass.required' => 'Vui lòng nhập lại mật khẩu',
   			'txt-repass.same' => 'Mật khẩu nhập lại không trùng khớp',
   			'txtname.required' => 'Nhập tên hiển thị'
   		]);
   		$newuser = new User;
   		$newuser->username = $req->txtuser;
   		$newuser->name = $req->txtname;
   		$newuser->password = bcrypt($req->txtpass);
   		$newuser->email = $req->txtmail;
   		$newuser->save();
   		return redirect('/user/login')->with('success','Đăng kí thành công, bạn có thể đăng nhập và tạo tin mới ngay bây giờ!');
   	}
      
   	/* Login */
   	public function get_login(){
         $categories = Categories::all();
   		return view('home.login',['categories'=>$categories]);
   	}

   	public function post_login(Request $req){
   		$req->validate([
   			'txtuser' => 'required',
   			'txtpass' => 'required',
   			
   		],[
   			'txtuser.required' => 'Vui lòng nhập tài khoản',
   			'txtpass.required' => 'Vui lòng nhập mật khẩu'
   			
   		]);
   		if(Auth::attempt(['username'=>$req->txtuser,'password'=>$req->txtpass])){
    		return redirect('/');
    	}
    	else{
         return redirect('user/login')->with('warn','Tài khoản hoặc mật khẩu không đúng');
       }     			
   	}

   	public function logout(){
   		Auth::logout();
		return redirect('user/login');
   	}

      public function getprofile(){
         $mypost = Motelroom::where('user_id',Auth::user()->id)->get();
         $categories = Categories::all();
         return view('home.profile',[
            'categories'=>$categories,
            'mypost'=> $mypost
         ]);
      }

      public function getEditprofile(){
         $user = User::find(Auth::user()->id);
         $categories = Categories::all();
         return view('home.edit-profile',[
            'categories'=>$categories,
            'user'=> $user
         ]);
      }

      public function postEditprofile(Request $request){
         $categories = Categories::all();
         $user = User::find(Auth::id());
         if ($request->hasFile('avtuser')){
            $file = $request->file('avtuser');
//            var_dump($file);
            $exten = $file->getClientOriginalExtension();
            if($exten != 'jpg' && $exten != 'png' && $exten !='jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten !='JPEG' )
                return redirect('user/profile/edit')->with('thongbao','Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
            $Hinh = 'avatar-'.$user->username.'-'.time().'.'.$exten;
            while (file_exists('uploads/avatars/'.$Hinh)) {
                 $Hinh = 'avatar-'.$user->username.'-'.time().'.'.$exten;
            }
            if(file_exists('uploads/avatars/'.$user->avatar))
               unlink('uploads/avatars/'.$user->avatar);

            $file->move('uploads/avatars',$Hinh);
            $user->avatar = $Hinh;
         }
         $this->validate($request,[
               'txtname' => 'min:3|max:20'
            ],[
               'txtname.min' => 'Tên phải lớn hơn 3 và nhỏ hơn 20 kí tự',
               'txtname.max' => 'Tên phải lớn hơn 3 và nhỏ hơn 20 kí tự'
         ]);
         if(($request->txtpass != '' ) || ($request->retxtpass != '')){
            $this->validate($request,[
               'txtpass' => 'min:3|max:32',
               'retxtpass' => 'same:txtpass',
            ],[
               'txtpass.min' => 'password phải lớn hơn 3 và nhỏ hơn 32 kí tự',
               'txtpass.max' => 'password phải lớn hơn 3 và nhỏ hơn 32 kí tự',
               'retxtpass.same' => 'Nhập lại mật khẩu không đúng',
               'retxtpass.required' => 'Vui lòng nhập lại mật khẩu',
            ]);
            $user->password = bcrypt($request->txtpass);
         }
         
         $user->name = $request->txtname;
         $user->save();
         return redirect('user/profile/edit')->with('thongbao','Cập nhật thông tin thành công');
         
      }

   	/* Đăng tin */
   	public function get_dangtin(){
         $district = District::all();
         $categories = Categories::all();
   		return view('home.dangtin',[
            'district'=>$district,
            'categories'=>$categories
         ]);
   	}

      public function post_dangtin(Request $request){
          $input=$request->all();
          $request->validate([
            'txttitle' => 'required',
            'txtaddress' => 'required',
            'txtprice' => 'required',
            'txtarea' => 'required',
            'txtphone' => 'required',
            'txtdescription' => 'required',
            'txtaddress' => 'required',
         ],
         [  
            'txttitle.required' => 'Nhập tiêu đề bài đăng',
            'txtaddress.required' => 'Nhập địa chỉ phòng trọ',
            'txtprice.required' => 'Nhập giá thuê phòng trọ',
            'txtarea.required' => 'Nhập diện tích phòng trọ',
            'txtphone.required' => 'Nhập SĐT chủ phòng trọ (cần liên hệ)',
            'txtdescription.required' => 'Nhập mô tả ngắn cho phòng trọ',
            'txtaddress.required' => 'Nhập hoặc chọn địa chỉ phòng trọ trên bản đồ'
         ]);
        

          // ham random
          function randomStringABCD($length = 4) {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[mt_rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

         /* Check file */
          $json_img ="";
         if ($request->hasFile('hinhanh')){
            
            $inputfile =  $request->file('hinhanh');
                foreach ($inputfile as $filehinh) {
                    $namefile = "phongtro-" . rand(0,999) . "-" . randomStringABCD() . '.jpg';
                   
                    $filehinh->move('public/uploads/images',$namefile);
                }
                $json_img = $namefile;

         }
         else {

            $json_img = "no_image_room.png";
           
         }
        
        // reaname code room and add code room
        $coderoom = mt_rand(0,999) . "-" . randomStringABCD();     

         /* tiện ích*/
         
         /* ----*/ 
         /* get LatLng google map */ 
        
         $json_latlng = '{"0":"16.06139802641261","1":"108.22745463068135"}';
         /* --- */
         /* New Phòng trọ */

         $motel = new Motelroom;
         $motel->title = $request->txttitle;
         $motel->coderoom = $coderoom;
         $motel->description = $request->txtdescription;
         $motel->price = $request->txtprice;
         $motel->area = $request->txtarea;
         $motel->count_view = 0;
         $motel->address = $request->txtaddress;
         $motel->latlng = $json_latlng;
         $motel->images = $json_img;
         $motel->user_id = Auth::user()->id;
         $motel->category_id = $request->idcategory;
         $motel->district_id = $request->iddistrict;
         $motel->phone = $request->txtphone;
         $motel->save();
         return redirect('/user/dangtin')->with('success','Đăng tin thành công. Vui lòng đợi Admin kiểm duyệt');

      }

      public function get_adddiennuoc() {
         return view('home.themsodiennuoc');
      }
}
