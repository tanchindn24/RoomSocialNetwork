<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() :View
    {
        return view('home');
    }

    public function listPosts() :View
    {
        return view('home.list_posts');
    }

    public function detailPosts() :View
    {
        return view('home.detail_posts');
    }

    public function registerStore(array $input) :View
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'role' => ['required'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => $input['role'],
        ]);

        return view();
    }

    public function login() :View
    {
        return view('home.login');
    }

    public function loginStore(Request $request) :View
    {
//        $credentials = $request->only('email', 'password');
//        $rememberMe = $request->has('remember');
//
//        if (Auth::attempt($credentials, $rememberMe)) {
//            $user = Auth::user();
//            $token = str_random(64);
//            $user->remember_token = $token;
//            $user->save();
//
//            if ($rememberMe) {
//                Session::remember('remember_token', $token, 1440);
//            } else {
//                \session(['remember_token' => $token]);
//            }
//            return redirect()->intended('/');
//        }
        return view('home.index');
    }
}
