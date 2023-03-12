<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Location;
use App\Models\Area;
use App\Models\Room;
use App\Models\Availability;
use DateTime;

class RoomController extends Controller
{

    private $dayLabels = array("Mon","Tue","Wed","Thu","Fri","Sat","Sun");

    private $currentYear=0;

    private $currentMonth=0;

    private $currentDay=0;

    private $currentDate=null;

    private $daysInMonth=0;

    private $naviHref= null;

    private function _showDay($cellNumber,$id){

        if($this->currentDay==0){

            $firstDayOfTheWeek = date('N',strtotime($this->currentYear.'-'.$this->currentMonth.'-01'));

            if(intval($cellNumber) == intval($firstDayOfTheWeek)){

                $this->currentDay=1;

            }
        }

        if( ($this->currentDay!=0)&&($this->currentDay<=$this->daysInMonth) ){

            $this->currentDate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));


            $cellContent = $this->currentDay;


            $this->currentDay++;

        }else{

            $this->currentDate =null;

            $cellContent=null;
        }

        if($cellContent != ''  && date('Y-m-d') <= $this->currentDate){

            $availablitydatacount = 0;
            if($id != ''){

                $availabilitycountcollection =  Availability :: where('room_id',$id)->where('start_date',$this->currentDate)->first();

                $availabledate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));

                $availablitydatacount =  isset($availabilitycountcollection) ? $availabilitycountcollection->total_bed_count : 0;
            }
            $input_tag = '<span>-'.$availablitydatacount.'</span><br><span class=" btn btn-link fz14 availabiltyupdate fa fa-edit" data-availability = "'.$availablitydatacount.'" data-room_id = "'.$id.'" data-date = "'.$this->currentDate.'" data-toggle="modal" data-target="#exampleModal"  style="font-size: 11px; font-weight: bold; cursor: pointer; color: red;" >
            update
          </span>' ;
        }else if($cellContent != ''){
            $availabilitycountcollection =  Availability :: where('room_id',$id)->where('start_date',$this->currentDate)->first();
            $availabledate = date('Y-m-d',strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));

            $availablitydatacount =  isset($availabilitycountcollection) ? $availabilitycountcollection->total_bed_count : 0;
            $input_tag   = '';
        }else{
            $input_tag   = '';
        }


        return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
                ($cellContent==null?'mask':'').'">'.$cellContent.$input_tag.'</li>';
    }

    /**
    * create navigation
    */
    private function _createNavi(){

        $nextMonth = $this->currentMonth==12?1:intval($this->currentMonth)+1;

        $nextYear = $this->currentMonth==12?intval($this->currentYear)+1:$this->currentYear;

        $preMonth = $this->currentMonth==1?12:intval($this->currentMonth)-1;

        $preYear = $this->currentMonth==1?intval($this->currentYear)-1:$this->currentYear;

       $nextmonth = sprintf('%02d',$nextMonth);



       return
       '<div class="header">'.
           '<a class="prev" href="'.$this->naviHref.'?month='.sprintf('%02d',$preMonth).'&year='.$preYear.'">Prev</a>'.
               '<span class="title">'.date('Y M',strtotime($this->currentYear.'-'.$this->currentMonth.'-1')).'</span>'.
           '<a class="next" href="'.$this->naviHref.'?month='.sprintf("%02d", $nextMonth).'&year='.$nextYear.'">Next</a>'.
       '</div>';
    }

    /**
    * create calendar week labels
    */
    private function _createLabels(){

        $content='';

        foreach($this->dayLabels as $index=>$label){

            $content.='<li class="'.($label==6?'end title':'start title').' title">'.$label.'</li>';

        }

        return $content;
    }



    /**
    * calculate number of weeks in a particular month
    */
    private function _weeksInMonth($month=null,$year=null){

        if( null==($year) ) {
            $year =  date("Y",time());
        }

        if(null==($month)) {
            $month = date("m",time());
        }

        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month,$year);

        $numOfweeks = ($daysInMonths%7==0?0:1) + intval($daysInMonths/7);

        $monthEndingDay= date('N',strtotime($year.'-'.$month.'-'.$daysInMonths));

        $monthStartDay = date('N',strtotime($year.'-'.$month.'-01'));

        if($monthEndingDay<$monthStartDay){

            $numOfweeks++;

        }

        return $numOfweeks;
    }



    private function _daysInMonth($month=null,$year=null){

        if(null==($year))
            $year =  date("Y",time());

        if(null==($month))
            $month = date("m",time());

        return date('t',strtotime($year.'-'.$month.'-01'));
    }
    public function vacancyupdate (Request $request, $id){




        $_GET['year'] =   (isset($_GET['year'])) ? $_GET['year'] : date('Y');
        $_GET['month']  = isset($_GET['month']) ? $_GET['month'] :date('m');

        $year  = null;

        $month = null;

        if(null==$year&&isset($_GET['year'])){

            $year = $_GET['year'];

        }else if(null==$year){

            $year = date("Y",time());

        }

        if(null==$month&&isset($_GET['month'])){

            $month = $_GET['month'];

        }else if(null==$month){

            $month = date("m",time());

        }

        $this->currentYear=$year;

        $this->currentMonth=$month;

        $this->daysInMonth=$this->_daysInMonth($month,$year);

        $content='<div id="calendar">'.
                        '<div class="box">'.
                        $this->_createNavi().
                        '</div>'.
                        '<div class="box-content">'.
                                '<ul class="label">'.$this->_createLabels().'</ul>';
                                $content.='<div class="clear"></div>';
                                $content.='<ul class="dates">';

                                $weeksInMonth = $this->_weeksInMonth($month,$year);
                                // Create weeks in a month
                                for( $i=0; $i<$weeksInMonth; $i++ ){

                                    //Create days in a week
                                    for($j=1;$j<=7;$j++){
                                        $content.=$this->_showDay($i*7+$j,$id);
                                    }
                                }

                                $content.='</ul>';

                                $content.='<div class="clear"></div>';

                        $content.='</div>';

        $content.='</div>';

        $rows = DB::table('property_rooms')->select("property_rooms.*","property_rooms.property_id as propertyid","properties.*")
        ->leftJoin('properties', function ($join)  {
      $join->on('properties.id', '=', 'property_rooms.property_id');
     })->where('property_rooms.id', '=',$id)->get();


     $property =DB::table('property_rooms')->select("property_rooms.*","properties.*","property_rooms.id as roomid")
     ->leftJoin('properties', function ($join)  {
   $join->on('properties.id', '=', 'property_rooms.property_id');
  })->get();





    $data = array('html'=> $content,
    'room_id' => $id,
    'rows'    => $rows,
    'property' => $property)
                    ;

    return view('owner.room.vacancy', $data);


    }

    public function roomvacancyupdate($id){

        $id = str_replace('p_','',$id);
        $rows =DB::table('property_rooms')->select("property_rooms.*","properties.*","property_rooms.id as roomid")
        ->leftJoin('properties', function ($join)  {
      $join->on('properties.id', '=', 'property_rooms.property_id');
     })->get();



            $data = array('html'=> '',
            'room_id' => $id,
            'property'    => $rows,
            'rows' => $rows);

return view('owner.room.vacancy', $data);



    }



    public function availabilityUpdate(Request $request){

        $roomid = $request->input('roomid');
        $date  = $request->input('date');
        $count = $request->input('room_count');



        $availabilitycount =  Availability :: where('room_id',$roomid)->where('start_date',$date)->first();



        try{
            if($availabilitycount == ''){
                $room_availability                      = new Availability();
                    $room_availability->room_id             = $roomid;
                    $room_availability->total_bed_count      = $count;
                    $room_availability->booked               = 0;
                    $room_availability->vacant_bed_count               = 0;
                    $room_availability->create_user               =  Auth::id();
                    $room_availability->update_user               =  Auth::id();
                    $room_availability->start_date          = $date;
                    $room_availability->save();

            }else{
                Availability::where('id',$availabilitycount->id)->update(['total_bed_count'=>$count]);
            }

        $result =  array('status' =>1,
        'message' => 'Room Count Update Successfully');
        }
        catch(\Exception $e){
            $result =  array('status' =>0,
            'message' => $e->getMessage());
           // Log::warning('roomavailabilty: '.$e->getMessage());
        }


       return $result;
    }


    public function availabiltybulkupdate(Request $request){
        //dd($request->input());
        $earlier = new DateTime("2010-07-06");
        $later = new DateTime("2010-07-09");
        $room_id = $request->roomid;
        $dates= $this->date_range($request->start_date, $request->end_date, "+1 day", "Y-m-d",$room_id,$request->availabilty);
        $result =  array('status' =>1,
        'message' => 'Room Count Update Successfully');
        return $result;






    }

    public function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d',$room_id,$count ) {
        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while( $current <= $last ) {
            $finddate =  date($output_format, $current);

            $availabilitycount =  Availability :: where('room_id',$room_id)->where('start_date',$finddate)->first();


            if($availabilitycount == ''){
                $room_availability                      = new Availability();
                    $room_availability->room_id             = $room_id;
                    $room_availability->total_bed_count      = $count;
                    $room_availability->booked               = 0;
                    $room_availability->vacant_bed_count               = 0;
                    $room_availability->create_user               =  Auth::id();
                    $room_availability->update_user               =  Auth::id();
                    $room_availability->start_date          = $finddate;
                    $room_availability->save();

            }else{
                Availability::where('id',$availabilitycount->id)->update(['total_bed_count'=>$count]);
            }

            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;

    }

}
