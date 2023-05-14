<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests\ValidationCheckLogin;
use Auth;

use App\Rules\password_is_vaild;

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
        $this->middleware('guest')->except('logout');
    }

    public function loginView(Request $request){
        
        return view("auth.login");
    }

    public function login(ValidationCheckLogin $request){
        if($request->isMethod('post')){

            $data=$request->only('mail','password');
            // ログインが成功したら、トップページへ
            //↓ログイン条件は公開時には消すこと
            if(Auth::attempt($data)){
                return redirect('/top');
            }else{

                return redirect("/login")
                ->with('loginError','メールアドレスもしくはパスワードが違います。')
                ->withInput();
                return view("auth.login");
            }
        }
    }


    public function logout(Request $request){
        Auth::logout();

        
        return redirect("/login");
    }
}
