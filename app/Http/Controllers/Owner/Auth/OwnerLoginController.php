<?php

namespace App\Http\Controllers\Owner\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class OwnerLoginController extends Controller
{

    use AuthenticatesUsers;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function ownerlogin(Request $request)
    {
       $this->validate($request, [
            'email' =>    'required',
            'password' => 'required',
          ]);
          
        // dd($request->all());

        // if($request->remember===null){
        //     setcookie('admin_login_email',$request->email,100);
        //     setcookie('admin_login_pass',$request->password,100);
        // }else{
        //     setcookie('admin_login_email',$request->email,time()+60*60*24*100);
        //     setcookie('admin_login_pass',$request->password,time()+60*60*24*100);
        // }
        
        if(Auth::guard('web')->attempt($request->all())){
            // dd(Auth::guard('web')->user()->user_role == 1);
            // return redirect()->route('owner.dashboard')->with('success',"You have login successfully!");
            if(Auth::guard('web')->user()->user_role == 1){
                // dd('df');
                return response()->json(['status'=>true,'message'=>'You have login successfully! Just wait for redirect.','url'=>'owner.dashboard'],200);
            }
            else{
                Auth::guard('web')->logout();
            }
            // dd(Auth::guard('web')->user());
        }
        return response()->json(['status'=>false,'message'=>'These credentials does not match with our record'], 200);
        
        // return redirect()->back()->with('error', 'These credentials does not match with our record');
    }

    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    public function logout() {
        // dd('df');
        Auth::guard('web')->logout();
        // return redirect()->route('/')->with('success','You have logout successfully!');
    }

    public function dashboard(){
        return "<h1>Hello Owner</h1>";
    }
}