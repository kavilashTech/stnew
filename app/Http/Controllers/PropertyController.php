<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PropertyController extends Controller
{
    //

    public function detail(Request $request,$slug)
    {
        return view('detail');
    }

    public function propertyview(Request $request,$id)
    {
        return view('property');
    }
}
