<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;

class DashboardController extends Controller
{
    public function index(){
        $pending_owners = User::where(['user_role'=>1,'status'=>'2'])->get();
        $pending_properties = Property::with('category')->where(['status'=>'1'])->get();
        return view('admin.Dashboard',compact('pending_owners','pending_properties'));
    }

    public function ownerApprovel(Request $request)
    {
        try
        {
            
            $data = User::where('id',$request->id)->first();
            $data->status = $request->status;
            $data->save();
            $msg = $request->status  == 0 ? 'reject':'approved';
            return response()->json(['status'=>true,'message'=>'User has been '.$msg.' Successfully!']);
        }
        catch(Exception $e){
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }

    public function propertyApprovel(Request $request)
    {
        try
        {
            $data = Property::where('id',$request->id)->first();
            $data->status = $request->status;
            $data->save();
            $msg = $request->status  == 2 ? 'approved':'reject';
            return response()->json(['status'=>true,'message'=>'Property has been '.$msg.' Successfully!']);
        }
        catch(Exception $e){
            return response()->json(['status'=>false,'message'=>$e->getMessage()]);
        }
    }
}
