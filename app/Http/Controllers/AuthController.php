<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Exception;

use App\User;

class AuthController extends Controller
{
    public function login(Request $request) {

        $creds = $request->only(['username','password']);

        if(!$token=auth()->attempt($creds)){
            
            return response()->json([
                'success' => false,
                'message' => 'sai tai khoan hoac mat khau, vui long kiem tra lai!'
            ]);
        }
        return response()->json([
            'success' =>true,
            'token' => $token,
            'user' => Auth::user()
        ]);
    }
    
    public function register(Request $request) {

        $encryptedPass = Hash::make($request->password);

        $user = new User;

        try{
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->password = $encryptedPass;
            $user->save();
            return $this->login($request);
        }
        catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => ''.$e
            ]);
        }
    }

    public function logout(Request $request){
        try{
            JWTAuth::invalidate(JWTAuth::parseToken($request->token));
            return response()->json([
                'success' => true,
                'message' => 'logout success'
            ]);
        }
        catch(Exception $e){
            return response()->json([
                'success' => false,
                'message' => ''.$e
            ]);
        }
    }

    public function saveUserInfo(request $request) {
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        $avatar = 'no-avatar.jpg';
        if($request->avatar!='no-avatar.jpg')
        {
            $avatar = "Avatar-" . rand(0,9999) . '.jpg';
            file_put_contents('public/uploads/avatars/'.$avatar,base64_decode($request->avatar));
            $user->avatar = $avatar;
        }

        $user->update();

        return response()->json([
            'success' => true,
            'avatar' => $avatar
        ]);
    }
}
