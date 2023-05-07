<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.login');
    }

    public function loginStore(Request $request)
    {

        $rule = [
            'email' => 'required',
            //'email' => 'required|email:rfc,dns',
            'login.password' => 'required|min:8|max:14'
        ];
        $message = [
            'email.required' => 'Email is required',
            'email.email' => 'Email address is not correct',
            'login.password.required' => 'Password is required',
            'login.password.min' => 'Password must be between 8 and 14 characters',
            'login.password.max' => 'Password must be between 8 and 14 characters'
        ];


        $validation = Validator::make($request->all(), $rule, $message);

        if ($validation->fails()) {
            return redirect('admin/login')
                ->withErrors($validation)
                ->withInput();
        }

        //$credentials = $request->only('email', 'login.password');

        $email = $request->input('email');
        $password = $request->input('login.password');

        if (!User::where('email', $email)->exists()) {
            return redirect('/admin/login')
                ->with('notification', 'Email does not exist');
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('admin')
                ->with('notification', 'Login success');
        } else {
            return redirect('admin/login')
                ->with('notification', 'Email or password is incorrect');
        }

        return redirect('admin');
    }

    public function register(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return redirect('admin/login');
    }

    public function registerStore(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        return redirect('admin/login');
    }

    public function logout(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
