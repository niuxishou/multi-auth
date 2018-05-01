<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Admin;
use App\Worker;

use Validator;
use App\Applicant;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class OrderStylistController extends Controller
{
	
    public function order(Request $request){
		
		$schedule_id = $request->input("id");
		$now_schedule = DB::table("schedules")->where("id", $schedule_id)->get();
		$schedule = $now_schedule[0];
		
        $worker_id = $schedule->worker_id;
		$order_date = $schedule->date;
		
        $now_worker = DB::table("worker_info")->where("id", $worker_id)->get();
		
		if($now_worker == null){
            return redirect("/show_stylist");
        }
		
		$worker = $now_worker[0];
		
		$user_id = Auth::id();
		$now_user = DB::table("users")->where("id", $user_id)->get();
		
		if($now_user == null){
            return redirect("/show_stylist");
        }
		
		$user = $now_user[0];
		
		if( $request->input("action") == "依頼" ) {	
			$user_id = $request->input('user_id');
			$user_name = $request->input('user_name');
			$worker_id = $request->input('worker_id');
			$worker_name = $request->input('worker_name');
			
			if($request->input('content_1') != ""){
				$content_1 = $request->input('content_1');
			} else {
				$content_1 = "";
			}
			if($request->input('content_2') != ""){
				$content_2 = $request->input('content_2');
			} else {
				$content_2 = "";
			}
			if($request->input('content_3') != ""){
				$content_3 = $request->input('content_3');
			} else {
				$content_3 = "";
			}
			if($request->input('content_4') != ""){
				$content_4 = $request->input('content_4');
			} else {
				$content_4 = "";
			}
			if($request->input('content_5') != ""){
				$content_5 = $request->input('content_5');
			} else {
				$content_5 = "";
			}
			if($request->input('content_6') != ""){
				$content_6 = $request->input('content_6');
			} else {
				$content_6 = "";
			}
			$points = 400;
			$date = date("Y/m/d");
			$status = "依頼受付";
			$delete_flag = "0";
			
            DB::table('orders')->insert([
                'user_id' => $user_id,
                'user_name' => $user_name,
                'worker_id' => $worker_id,
                'worker_name' => $worker_name,
				'content_1' => $content_1,
				'content_2' => $content_2,
				'content_3' => $content_3,
				'content_4' => $content_4,
				'content_5' => $content_5,
				'content_6' => $content_6,
				'points' => $points,
				'date' => $order_date,
				'status' => $status,
				//'created_time' => $date,
				'delete_flag' => $delete_flag,
                'created_at' => $date,
                'updated_at' => $date,
            ]);			
			
			return redirect("thanks");			
		}
		
		return view("order_stylist")->with([
			"schedule" => $schedule,
            "worker" => $worker,
			"user" => $user,
        ]);
		
	}
}
