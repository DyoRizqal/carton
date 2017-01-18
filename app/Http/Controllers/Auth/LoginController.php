<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Hash;
use Auth;
use App\Artikel;

use App\Akun as User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function tryLogin(Request $r)
    {
        $email = $r->input('email');
        $password = $r->input('password');

        $checkEmail = User::where('email', $email)->first();
        
        
        if (count($checkEmail) == 0) {
            // kalo error
            $r->session()->put('error', 'Email tidak ditemukan!');
            // echo session()->get('error');
            return redirect(url('login'));
        }
        else {
            // kalo password cocok
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                // Authentication passed...
                return redirect(url('home'));
            }
            else {
                // kalo error
                $r->session()->put('error', 'Password tidak cocok!');
                return redirect(url('login'));
            }
        }
    }
}
