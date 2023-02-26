<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locations = Location::get();
        return view('admin.location.index',compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.location.createOrUpdate');
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
        $data = Location::create(['name'=>$request->name,'status'=>$request->status]);
        return redirect()->route('admin.locations.index')->with('success','Location has been added successfully!');
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
    public function edit($id)
    {
        $location = Location::findorFail($id);
        return view('admin.location.createOrUpdate',compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'   => 'required|max:255',
        ]);

        $location = Location::findorFail($id);
        // $status = $request->location == 1 ? 0 : 1;
        $data = $location->update($request->all());
        return redirect()->route('admin.locations.index')->with('success','Location has been Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            
            $data = Location::findorfail($id);
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
