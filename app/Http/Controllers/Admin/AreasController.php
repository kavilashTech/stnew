<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Area;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // try{
            $areas  = Area::where('location_id',$request->locationId)->get();
            $locationId =  $request->locationId;
            return view('admin.area.index',compact('areas','locationId'));
        // }
        // catch(\Exception $e){
        //     abort('404');
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $locationId =  $request->locationId;   
        return view('admin.area.createOrUpdate',compact('locationId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required|max:255',
        ]);
        $data = area::create(['name'=>$request->name,'status'=>$request->status,'location_id'=>$request->locationId]);
        // dd($data);
        return redirect()->route('admin.areas',['locationId'=>$request->locationId])->with('success','Area has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $area = Area::findorFail($request->id);
        $locationId =  $request->locationId;       
        return view('admin.area.createOrUpdate',compact('area','locationId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required|max:255',
        ]);

        // dd($request->all());
        $ares = Area::findorFail($request->id);
        // $status = $request->status == '1' ? '0' : '1';
        $data = $ares->update($request->all());
        return redirect()->route('admin.areas',['locationId'=>$ares->location_id])->with('success','Area has been Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( $locationId, $id )
    {
        // try{
    
            $data = Area::findorfail($id);
            $data->delete();
            $response = ['status'=>true,'message'=>'Record has been deleted successfully!'];
            return $response;
        // }
        // catch (\Exception $e){
        //     $response = ['status'=>false,'message'=>'Something went wrong!'] ;
        //     return $response;
        // }
    }
}
