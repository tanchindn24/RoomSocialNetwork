<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator,Redirect,Response,File;
use Socialite;

class AuthController extends Controller
{

    /*User*/
    public function dangky(Request $request)
    {
        $request->validate([
            'txt_email'=> 'required|unique:tbl_user,email',
            'txt_name'=> 'required',
            'txt_password'=>'required|min:8',
            'txt_password-conf'=>'required|same:txt_password'
        ],[
            'txt_email.required'=>'Vui lòng nhập email',
            'txt_email.unique'=>'Email đã được đăng ký',
            'txt_name.required'=>'Vui lòng nhập họ và tên',
            'txt_password.required'=>'Mật khẩu không được dưới 8 ký tự',
            'txt_password-conf.same'=>'Mật khẩu không trùng khớp',
        ]);

//        $user = User::create([
//            'name'=>$request->txt_name,
//            'email'=>$request->txt_email,
//            'password'=> Hash::make($request->txt_password),
//            'roles'=>$request->roles,
//        ]);

        $user = new User();
        $user->name = $request->txt_name;
        $user->email = $request->txt_email;
        $user->password = Hash::make($request->txt_password);
        $user->roles = 2;
        $user->provider = 'website';
        $user->provider_id = 'd1befa03c79ca0b84ecc488dea96bc68';

        $user->save();

        return redirect(RouteServiceProvider::LOGIN)->with('notification_register','Đăng ký tài khoản thành công');
    }

    public function dangnhap(Request $request)
    {
        $request->validate([
            'txt_email'=>'required',
            'txt_password'=>'required',
        ],[
            'txt_email.required'=>'Vui lòng nhập email',
            'txt_password.required'=>'Vui lòng nhập mật khẩu',
        ]);

        if(Auth::attempt(['email'=>$request->txt_email, 'password'=>$request->txt_password]))
        {
           return redirect(RouteServiceProvider::INDEX_HOME);
        }else{
            return redirect(RouteServiceProvider::LOGIN)->with('notification_login', 'Email hoặc mật khẩu không đúng');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect(RouteServiceProvider::INDEX_HOME);
    }

    /* Admin */
    public function login_admin(Request $request)
    {
        $request->validate([
            'txt_email'=>'required',
            'txt_password'=>'required',
            'roles'=>'required',
        ],[
            'txt_email.required'=>'Vui lòng nhập email',
            'txt_password.required'=>'Vui lòng nhập mật khẩu',
            'roles.required'=>'Bạn không phải Admin'
        ]);

        if (Auth::attempt(['email'=>$request->txt_email, 'password'=>$request->txt_password]) && Auth::user()->roles==1)
        {
            return redirect(RouteServiceProvider::ADMIN);
        }elseif(Auth::attempt(['email'=>$request->txt_email, 'password'=>$request->txt_password]) && Auth::user()->roles==2)
        {
            return redirect(RouteServiceProvider::CHUTRO);
        }else
        {
            return redirect(RouteServiceProvider::LOGINADMIN)->with('notification_login', 'Email hoặc mật khẩu không đúng');
        }
    }

    public function register_admin()
    {
        //
    }

    public function logout_dashboard()
    {
        Auth::logout();
        return redirect(RouteServiceProvider::INDEX_HOME);
    }

    /*Socicalite*/
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
        // redirect user tới trang xác thực của Google.
    }
    public function callback($provider)
    {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo,$provider);
        auth()->login($user);
//        return redirect(RouteServiceProvider::CHUTRO);
        if (Auth::user()->roles==1)
        {
            return redirect(RouteServiceProvider::ADMIN);
        }elseif(Auth::user()->roles==2)
        {
            return redirect(RouteServiceProvider::INDEX_HOME);
        }else
        {
            return redirect(RouteServiceProvider::INDEX_HOME);
        }
    }
    function createUser($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $getInfo->name,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id,
                'roles' => 2,
            ]);
        }
        return $user;
    }
}
