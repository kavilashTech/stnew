<?php

namespace App\Http\Controllers;
use App\Models\Property;
use App\Models\Category;
use App\Models\Area;
use App\Models\Location;
use App\Models\Enquiry;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Mail\EnquirtMail;
use Mail;

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
        $faqs = Faq::where('status',1)->get();
        return view('pages.faq_page',compact('faqs'));
    }
    
    public function contactUs()
    {
        return view('pages.contact_us');
    }

    public function postContactUs(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
                'last_name' => 'required|max:255',
                'email' => 'required|email',
                'mobile_number' => 'required|digits_between:10,12',
                'message' => 'required',
            ]);

        try{
            Enquiry::create($validated);
            Mail::send('mailTemplate.enquiry',['name'=>$validated['first_name'].$validated['last_name']], function($message) use ($validated)
            {
              $message->from(env('MAIL_FROM_ADDRESS'));
              $message->to($validated['email']);
              $message->subject($validated['message']);
            });
          
            return redirect()->back()->withSuccess('Your enquire has been send to admin. We will contact you shortly!');
        }catch (\Exception $e){
            return back()->withError($e->getMessage());
        }
    }
}
