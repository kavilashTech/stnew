<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Property;
use App\Models\Category;
use App\Models\Area;
use App\Models\Location;
use App\Models\Amenities;


class PropertyController extends Controller
{
    //

    public function index(Request $request)
    {


        $model_property= Property :: where("properties.status", "2");
        $markers = [];


        // if(($request->input('location_id')) && ($request->input('area_id')) && ($request->input('category_id')) && ($request->input('check_in')) && ($request->input('check_out'))){
        //     dd($request->input());
        // }
        if ($request->input('location_id') != '') {
            $location = Location::query()->where('id', $request->input('location_id'))->where("status","1")->first();

            if(!empty($location)){
                $model_property->join('locations', function ($join) use ($location) {
                    $join->on('locations.id', '=', 'properties.location_id');
                });
            }

        }
        if ($request->input('area_id') != '') {
            $model_property->where("properties.area_id",$request->input('area_id'));
        }

        if ($request->input('category_id') != '0') {
            $model_property->where("properties.category_id",$request->input('category_id'));
        }
        if ($request->input('check_in') != '') {

        }
        if ($request->input('check_out') != '') {

        }
        if(!empty($filter = $request->query("filter"))) {
            switch($filter) {
                case"new":
                    $model_property->orderBy("properties.id", "desc");
                    break;
                case"old":
                    $model_property->orderBy("properties.id", "asc");
                    break;

                case"name_high":
                    $model_property->orderBy("properties.property_title", "asc");
                    break;
                case"name_low":
                    $model_property->orderBy("properties.property_title", "desc");
                    break;
                default:
                    $model_property->orderBy("is_featured", "desc");
                    $model_property->orderBy("id", "desc");
                    break;
            }

        }


        $model_property->orderBy("properties.is_featured", "desc");
        $model_property->orderBy("properties.id", "desc");
        $model_property->groupBy("properties.id");
        $limit = min(20,$request->query('limit',10));

        $data = [
            'rows'               => $model_property->paginate($limit),
            'list_location'      => Location::where('status', '1')->get(),
            'list_category'      => Category::where('status', '1')->get(),
            'list_features'      => Property::where('status', '2')->where('is_featured',1)->get() ,
            'list_amenities'    => Amenities :: where('show_in_detail',1)->get(),
            'list_room_amenities'    => Amenities :: where('level',1)->get(),
            'property_min_max_price' => '',
            'markers'            => $markers,
            "blank"              => 1,
            "filter"             => $request->query('filter'),

        ];

        //dd($data);

        return view('propertysearch', $data);


    }

    public function detail(Request $request, $slug)
    {
        return view('detail');
    }

    public function propertyview(Request $request, $id)
    {
        return view('property');
    }

    public function locationdata(Request $request)
    {

        $locationid = $request->input('location');
        if($locationid != 0){
            $areadata = Area::where('location_id', $locationid)->get();
                } else {
                    $areadata = Area::where('status', 1)->get();
        }


        $output = [];
        foreach ($areadata as $area) {
            $output[] = array('id' => $area->id,
                            'value' => $area->name);
        }
        return $output;
    }
}
