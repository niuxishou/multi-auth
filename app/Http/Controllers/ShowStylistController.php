<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use MaskSystem\User;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class ShowStylistController extends Controller
{
	
    public function index(Request $request){

        if( $request->input("worker_id") == ""){
            return redirect("welcome");
        }

        $worker_id = $request->input("worker_id");
        $now_worker = DB::table("worker_info")->where("id", $worker_id)->get();

        if($now_worker == null){
            return redirect("welcome");
        }
		
		$worker = $now_worker[0];
		$schedule_list = DB::table("schedules")->where("worker_id", $worker_id)->get();

        return view("show_stylist")->with([
            "worker" => $worker,
			"schedule_list" => $schedule_list,
        ]);
    }

}
