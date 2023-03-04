<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class StaytypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories  = Category::get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.createOrUpdate');
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
            'categoryname'   => 'required|max:255',
            'sortorder'   => 'required|numeric  ',
        ],[
            'categoryname.required'=>'Name field is required',
            'sortorder.required'=>'Sort order field is required']
        );
        $data = Category::create(['categoryname'=>$request->categoryname,'sortorder'=>$request->sortorder,'status'=>$request->status]);
        return redirect()->route('admin.properties-categories.index')->with('success','Staytype has been added successfully!');
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
        $staytype = Category::findorFail($id);
        return view('admin.category.createOrUpdate',compact('staytype'));
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
            'categoryname'   => 'required|max:255',
            'sortorder'   => 'required|numeric',
        ]);

        $category = Category::findorFail($id);
        $data = $category->update($request->all());
        return redirect()->route('admin.properties-categories.index')->with('success','Stay type has been Updated successfully!');
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
            $data = Category::findorfail($id);
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
