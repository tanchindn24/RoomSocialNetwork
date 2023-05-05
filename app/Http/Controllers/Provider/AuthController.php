<?php

namespace App\Http\Controllers\Provider;

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
        return view('provider.login');
    }

    public function loginStore(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $rule = [
            'email' => 'required',
            //'email' => 'required|email:rfc,dns',
            'login.password' => 'required|min:7|max:14'
        ];
        $message = [
            'email.required' => 'Email is required',
            'email.email' => 'Email address is not correct',
            'login.password.required' => 'Password is required',
            'login.password.min' => 'Password must be between 7 and 14 characters',
            'login.password.max' => 'Password must be between 7 and 14 characters'
        ];

        $validation = Validator::make($request->all(), $rule, $message);

        if ($validation->fails()) {
            return redirect('provider/login')
                ->withErrors($validation)
                ->withInput();
        }

        $email = $request->input('email');
        $password = $request->input('login.password');

        if (!User::where('email', $email)->exists()) {
            return redirect('provider/login')
                ->with('notification', 'Email does not exist');
        }

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect('provider')
                ->with('notification', 'Email or password is incorrect');
        }

        return redirect('provider');
    }

    public function register(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('provider.register');
    }

    /**
     * @throws ValidationException
     */
    public function registerStore(Request $request): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        $rule = [
            'first_name' => 'required|min:2|max:20',
            'last_name' => 'required|min:2|max:20',
            'email' => 'required',
            'login.password' => 'required|min:7|max:14',
        ];

        $messages = [
            'first_name.required' => 'first name is required',
            'first_name.min' => 'first name 2 to 20 characters',
            'first_name.max' => 'first name 2 to 20 characters',
            'last_name.required' => 'last name is required',
            'last_name.min' => 'last name 2 to 20 characters',
            'last_name.max' => 'last name 2 to 20 characters',
            'email.required' => 'Email is required',
            'login.password.required' => 'Password is required',
            'login.password.min' => 'Password must be between 7 and 14 characters',
            'login.password.max' => 'Password must be between 7 and 14 characters'
        ];

        $validators = Validator::make($request->all(), $rule, $messages);

        if ($validators->fails()) {
            return redirect('provider/register')
                ->withErrors($validators)
                ->withInput();
        }

        $firstName = $request->input('first_name') ?? ' ';
        $lastName = $request->input('last_name') ?? ' ';
        $email = $request->input('email');
        $password = $request->input('password');

        if (User::where('email', '===', $email)->exists()) {
            return redirect('provider/register')
                ->with('notification', 'Email already exists, please use another email address');
        }

        $newUser = new User();
        $newUser->name = $lastName . ' ' . $firstName;
        $newUser->email = $email;
        $newUser->password = Hash::make($password);
        $newUser->roles = 2;
        $newUser->status = 2;
        $newUser->save();

        return redirect('provider/login')
            ->with('notification', 'Account registration is successful, please wait for admin to authenticate to use the service');
    }

    public function logout(): \Illuminate\Foundation\Application|\Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        Auth::logout();
        return redirect('provider/login');
    }
}
