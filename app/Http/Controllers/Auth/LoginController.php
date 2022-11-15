<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function authenticate(Request $request){
    //     $response = Http::asForm()->post('http://apiwfl.herokuapp.com/api/login', [
    //         'email' => $request->input('email'),
    //         'password' => $request->input('password'),
    //     ]);
    //     $status = $response->status();
    //     if($status == 200){
    //         $response = $response->object();
    //         $token = $response->access_token;
    //         $role = $response->role;
    //         $id = $response->id;
    //         $company_id = $response->company_id;
    //         $username = $response->username;
    //         $foto_profil = $response->foto_profil;
    //         session(['token' => $token]);
    //         session(['role' => $role]);
    //         session(['id' => $id]);
    //         session(['company_id' => $company_id]);
    //         session(['username' => $username]);
    //         session(['foto_profil' => $foto_profil]);
    //         return redirect()->intended('/');
    //     }
    //     return back()->with('loginError', 'Login failed!');
    // }
}
