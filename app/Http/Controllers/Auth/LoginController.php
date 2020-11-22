<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;

use Auth;

class LoginController extends Controller
{

    public function login(Request $request){
        $validatedData = $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $email      = $request->email;
        $password   = $request->password;

        $valid_data = User::where('email', $email)->first();

        $password_check = password_verify($password, @$valid_data->password);

        if($password_check == false){
            return back()->with('message', 'Email or Passrod Does not match');
        }

        if($valid_data->status == '0'){
            return back()->with('message', 'Sorry! You are not verified');
        }

        if(Auth::attempt(['email'=>$email, 'password'=>$password])){
            return redirect()->route('login');
        }
    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
