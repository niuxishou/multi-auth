<?php
 
namespace App\Http\Controllers\StylistAdmin;  

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
class HomeController extends Controller
{
 
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/stylistadmin/home';
	
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:stylistadmin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('stylistadmin.home');
    }
    
    public function list(Request $request){
        
        $now_applicant_list = DB::table("applicants")->where("status","応募")->get();
        
        $applicant_list = [];
        foreach($now_applicant_list as $now){
            $applicant_list[] = $now;
        }
        
        return view("stylistadmin/home")->with([
            "applicant_list" => $applicant_list
        ]);
    }
}