<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {        
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        

        if(auth()->attempt(array('username' => $input['username'], 'password' => $input['password'])))
        {
            if(auth()->user()->type == 1) {
                toast('Anda telah login','success');
                return redirect()->route('admin.home');
            }else if(auth()->user()->type == 2) {
                return redirect()->route('petugas.home');
            }else{
                return redirect()->route('user.home');
            }
        }else{
            toast('Username atau Password salah','error');
            return redirect()->route('login');
        }
    }

    public function logout(Request $request)
    {
        Session::flush();
        Auth::logout();

        toast('Anda telah logout','info');
        return redirect()->route('login');
    }
}
