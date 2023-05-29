<?php

namespace App\Http\Controllers\Seeker;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('home.login');
    }

    public function loginStore(Request $request)
    {
        $rule = [
            'email' => 'required',
            'password' => 'required|min:7|max:14',
        ];

        $message = [
            'email.required' => 'Email is required',
            'email.email' => 'Email address is not correct',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be between 7 and 14 characters',
            'password.max' => 'Password must be between 7 and 14 characters'
        ];

        $validation = Validator::make($request->all(), $rule, $message);

        if ($validation->fails()) {
            return redirect('login')
                ->withErrors($validation)
                ->withInput();
        }

        $email = $request->input('email');
        $password = $request->input('password');

        if (!User::where('email', $email)->exists()) {
            return redirect('login')
                ->with('notification', 'Email does not exist');
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('seeker')
                ->with('notification', 'Login success');
        }

        return redirect('seeker');
    }

    public function register()
    {
        return view('home.register');
    }

    public function registerStore(Request $request)
    {
        $rule = [
            'name' => 'required|min:1|max:20',
            'email' => 'required|unique:users',
            'password' => 'required|min:7|max:14|confirmed'
        ];

        $messages = [
            'name.required' => 'last name is required',
            'name.min' => 'last name 1 to 20 characters',
            'name.max' => 'last name 1 to 20 characters',
            'email.required' => 'Email is required',
            'email.unique' => 'Email is already taken',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be between 7 and 14 characters',
            'password.max' => 'Password must be between 7 and 14 characters',
            'password.confirmed' => 'Password confirmation does not match'
        ];

        $validators = Validator::make($request->all(), $rule, $messages);

        if ($validators->fails()) {
            return redirect('register')
                ->withErrors($validators)
                ->withInput();
        }

        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');

        if (User::where('email', '===', $email)->exists()) {
            return redirect('register')
                ->with('notification', 'Email already exists, please use another email address');
        }

        $newUser = new User();
        $newUser->name = $name;
        $newUser->email = $email;
        $newUser->password = Hash::make($password);
        $newUser->roles = 3;
        $newUser->status = 1;
        $newUser->save();

        return redirect('login')
            ->with('notification', 'Successful account registration, login to use the service');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
