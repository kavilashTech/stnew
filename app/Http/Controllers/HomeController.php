<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Category;
use App\Models\Area;
use App\Models\Location;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $propertycollection = Property::where('status', '2')->where('active', '1')->get();
        $areadata = Area::where('status', '1')->get();
        $locationdata = Location::where('status', '1')->get();
        $propertycategory = Category::where('status', '1')->orderBy('sortorder', 'Asc')->get();

        return view('welcome',compact('propertycategory','areadata','locationdata'));
    }

    public function aboutUs()
    {
        return view('pages.aboutus');
    }
    public function faq()
    {
        return view('pages.faq_page');
    }
}
