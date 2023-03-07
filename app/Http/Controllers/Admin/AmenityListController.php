<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Amenitielists;
use App\Models\Amenities;

class AmenityListController extends Controller
{
    public function index(Request $request)
    {
       
        $lists = Amenitielists::where('amenity_id',$request->parentid)->get();
        $parentid = $request->parentid;
        $parentname = Amenities::where('id',$parentid )->first();
        return view('admin.amenities.list.index',compact('lists','parentid','parentname'));
    }  
    
    public function create(Request $request)
    {
        $parentid = $request->parentid;
        $parentname = Amenities::where('id',$parentid )->first();
       return view('admin.amenities.list.createOrUpdate',compact('parentname','parentid'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required|max:255',
        ]);
        $data = Amenitielists::create(['name'=>$request->name,'value'=>$request->value,'amenity_id'=>$request->amenity_id]);
        return redirect()->route('admin.amenities.list',['parentid'=>$request->parentid])->with('success','Amenity List has been added successfully!');
    }

    public function edit(Request $request)
    {
     
        $amenitylist = Amenitielists::where(['id'=>$request->id])->first();
    
        if(!$amenitylist){
            abort('404');
        }
        $parentid = $request->parentid;
        $parentname = Amenities::where('id',$parentid )->first();
        return view('admin.amenities.list.createOrUpdate',compact('amenitylist','parentid','parentname'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required|max:255',
        ]);
        $amenitity = Amenitielists::findorFail($request->id);
        $data = $amenitity->update($request->all());
        return redirect()->route('admin.amenities.list',['parentid'=>$request->parentid])->with('success','Amenity List has been Updated successfully!');
    }

    public function destroy($id)
    {
        try{            
            $data = Amenitielists::findorfail($id);
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
