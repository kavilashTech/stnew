<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenities;

class AmenitiesController extends Controller
{
    public function index(Request $request)
    {
        $level = $request->level;
        if($level != 'property' && $level != 'room' ){
            abort('404');
        }
        $level = $level == 'property' ? '0' : '1';
        $amenities = Amenities::where('level',$level)->get();
        $level = $level == '0' ? 'property' : 'room';

        return view('admin.amenities.index',compact('amenities','level'));
    }  
    
    public function create(Request $request)
    {
        $level = $request->level;
        if($level != 'property' && $level != 'room' ){
            abort('404');
        }

        return view('admin.amenities.createOrUpdate',compact('level'));
    }


    public function store(Request $request)
    {        
        $this->validate($request, [
            'name'   => 'required|max:255',
        ]);
        $level = $request->level == 'property' ? 0 : 1;
    
        $data = Amenities::create(['name'=>$request->name,'show_in_detail'=>$request->show_in_detail,'type'=>$request->type,'level'=>$level]);
        $level = $request->level == 0 ? 'property' : 'room';
        // dd($level);
        return redirect()->route('admin.amenities',['level'=>$level])->with('success','Amenity has been added successfully!');
    }

    public function edit(Request $request)
    {        
        $amenity = Amenities::where(['id'=>$request->id])->first();
    
        if(!$amenity){
            abort('404');
        }
        $level = $request->level;
        return view('admin.amenities.createOrUpdate',compact('amenity','level'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required|max:255',
        ]);
        $amenitity = Amenities::findorFail($request->id);
        $data = $amenitity->update($request->all());
        return redirect()->route('admin.amenities',['level'=>$request->level])->with('success','Amenity has been Updated successfully!');
    }

    public function destroy($id)
    {
        try{            
            $data = Amenities::findorfail($id);
            $data->delete();
            $response = ['status'=>true,'message'=>'Record has been deleted successfully!'] ;
            return $response;
        }
        catch (\Exception $e){
            $response = ['status'=>false,'message'=>'Something went wrong!'] ;
            return $response;
        }
    }

}
