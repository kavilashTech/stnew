<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLoginForm()
    {
        return view('admin.auth.login', ['url' => 'admin']);
    }

    public function adminlogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if($request->remember===null){
            setcookie('admin_login_email',$request->email,100);
            setcookie('admin_login_pass',$request->password,100);
        }else{
            setcookie('admin_login_email',$request->email,time()+60*60*24*100);
            setcookie('admin_login_pass',$request->password,time()+60*60*24*100);
        }
        
        if(Auth::guard('admin')->attempt($this->credentials($request), $request->filled('remember'))){
            return redirect()->route('admin.dashboard')->with('success',"You have login successfully!");
        }
        return redirect()->back()->with('error', 'These credentials does not match with our record');
    }

    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.show.admin.form')->with('success','You have logout successfully!');
    }
}