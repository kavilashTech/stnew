<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Property;
use App\Models\Category;
use App\Models\Area;
use App\Models\Location;
use App\Models\Amenities;
use App\Models\Amenitielists;
use App\Models\Availability;
use App\Models\Propertyamenities;
use Illuminate\Support\Facades\DB;


class PropertyController extends Controller
{

    public function index(Request $request)
    {
        //dd($request->input());

        $model_property= Property :: where("properties.status", "2");

        $markers = [];


        // if(($request->input('location_id')) && ($request->input('area_id')) && ($request->input('category_id')) && ($request->input('check_in')) && ($request->input('check_out'))){
        //     dd($request->input());
        // }
        if ($request->input('location_id') != '0') {
            $location = Location::query()->where('id', $request->input('location_id'))->where("status","1")->first();

            if(!empty($location)){
                $model_property->join('locations', function ($join) use ($location) {
                    $join->on('locations.id', '=', 'properties.location_id');
                });
            }

        }
        if ($request->input('area_id') != '0' && !empty($request->input('area_id')) ) {
            $model_property->where("properties.area_id",$request->input('area_id'));
        }

        if ($request->input('category_id') != '0') {

           $aa =  $model_property->where("properties.category_id",$request->input('category_id'))->get();


        }
        if ($request->input('check_in') != '') {

        }
        if ($request->input('check_out') != '') {

        }

        if($request->property_amenities != ''){
              $joinmembers = implode(",",$request->property_amenities);
              $certi_id =trim($joinmembers,",");


            $model_property->join('property_amenities as proam', 'proam.property_id', "properties.id")->whereIn('proam.amlist_id', explode(",", $certi_id));

        }
        if($request->room_aminities != ''){

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
        if ($request->input('property_amenities') != '') {
            $model_property->groupBy("proam.id");
    }

        $limit = min(20,$request->query('limit',10));

        $data = [
            'rows'               => $model_property->paginate($limit),
            'list_location'      => Location::where('status', '1')->get(),
            'list_category'      => Category::where('status', '1')->get(),
            'list_features'      => Property::with('amenities')->where('status', '2')->where('is_featured',1)->get() ,
            'list_amenities'     => Amenities :: where('show_in_detail',1)->get(),
            'list_room_amenities' => Amenities :: where('level',1)->get(),
            'property_min_max_price' => '',
            'markers'            => $markers,
            "blank"              => 1,
            "filter"             => $request->query('filter'),
        ];

        // dd($data);

        return view('propertysearch', $data);


    }

    public function detail(Request $request, $slug)
    {

        $model_property= Property::with('exclusivity','rating','rating.user','rating.owner')->find($slug);
        $list_amienites = Propertyamenities :: Where('property_id',$slug)->get();
        $listof_rooms   = DB::table('property_rooms')->where('property_id',$slug)->get();

        $amentiearr = array();
        foreach($list_amienites as $litamienites){
            $amenitielist = Amenitielists ::whereIn('id', explode(",", $litamienites->amlist_id))->get();
            foreach($amenitielist as $amenitidata){
                $amentiearr[] = array('name' => $amenitidata->name,
                                    'icon' => 'property/'.$amenitidata->icon);
            }
        }
        // foreach($listof_rooms as $roomamt){
        //     $listof_rooms_amenities   = DB::table('room_amenities')->where('room_id',$roomamt->id)->get();
        //     foreach($listof_rooms_amenities as $roomamenities){
        //         $amenitielist = Amenitielists ::whereIn('id', explode(",", $roomamenities->amlist_id))->get();
        //     }
        // }

        $data = [
            'rows'               => $model_property,
            'propertyamentie'    => $amentiearr,
            'list_of_rooms'             => $listof_rooms,
        ];

    //  dd($data);
        return view('detail',$data);
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



    public function generateRandomRoomAvailabilityData(Request $request)
    {
        $roomid     = $request->roomid;
        $propertyid = $request->propertyid;
        $userid     =  Auth::id();
         $startdate = date('Y-m-d');
        $roomvacancy = Availability::where('room_id',$roomid)->whereDate('start_date', '>=', $startdate)->get();

        $data = array();

        foreach($roomvacancy as $roomdata){


            $data[] = array('date' =>$roomdata->start_date,
                            'fare' => $roomdata->total_bed_count);
        }

        return json_encode($data);

    }
}
