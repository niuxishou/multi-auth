<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Worker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;

class WorkerController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:worker');
    }
    
    public function edit_worker(Request $request){
		$worker_id = Auth::id();
        
        if($request->input('action') == "更新"){
            $rules = [
                'name_1' => 'required',
                'name_2' => 'required',
                'name_kana_1' => 'required',
                'name_kana_2' => 'required',
                'post' => 'required | digits:7',
                'pref' => 'required',
                'address_1' => 'required',
                'address_2' => 'required',
                'email' => 'required | email',
                'tel' => 'required | digits_between:10,14',
            ];
            $messages = [
                'name_1.required' => '名前（姓）は必ず入力してください。',
                'name_2.required' => '名前（名）は必ず入力してください。',
                'name_kana_1.required' => 'フリガナ（姓）は必ず入力してください。',
                'name_kana_2.required' => 'フリガナ（名）は必ず入力してください。',
                'post.required' => '郵便番号は必ず入力してください。',
                'post.digits' => '郵便番号は必ず7桁の半角数字で入力してください。',
                'pref.required' => '都道府県は必ず入力してください。',
                'address_1.required' => '市区町村は必ず入力してください。',
                'address_2.required' => '番地は必ず入力してください。',
                'email.required' => 'メールアドレスは必ず入力してください。',
                'email.email' => 'メールアドレスを正しく入力してください。',
                'tel.required' => '電話番号は必ず入力してください。',
                'tel.digits_between' => '電話番号を半角数字で正しく入力してください。',
            ];
            $validator = Validator::make($request->all(), $rules, $messages);
            $errors = $validator->errors();
            $request->flash();
            if($validator->fails()) {
                return redirect()->to("worker/edit_worker")->withErrors($validator)->withInput();
            }
            $name = $request->input('name_1') . "\t" . $request->input('name_2');
            $name_kana = $request->input('name_kana_1') . "\t" . $request->input('name_kana_2');
            $post = $request->input('post');
            $pref = $request->input('pref');
            $address_1 = $request->input('address_1');
            $address_2 = $request->input('address_2');
            if($request->input('address_3') == ""){
                $address_3 = "";
            } else {
                $address_3 = $request->input('address_3');
            }
            $email = $request->input('email');
            $tel = $request->input('tel');
            $date = date("Y/m/d H:i:s");
            
            DB::table('worker_info')->where("worker_id", $worker_id)
            ->update([
                'name' => $name,
                'name_kana' => $name_kana,
                'post' => $post,
                'pref' => $pref,
                'address_1' => $address_1,
                'address_2' => $address_2,
                'address_3' => $address_3,
                'email' => $email,
                'tel' => $tel,
                'updated_at' => $date
            ]);
            return redirect("worker/worker_editfinish");
        }
        $now_worker = DB::table("worker_info")->where("worker_id", $worker_id)->get();
        // 該当するユーザーがいなかったらリダイレクト
        if($now_worker == null){
            return redirect("home");
        }
		$worker = $now_worker[0];
		$aname = preg_split("/[\s,]+/", $worker->name);
		$worker->name_1 = $aname[0];
        $worker->name_2 = $aname[1];
		$aname_kana = preg_split("/[\s,]+/", $worker->name_kana);
		$worker->name_kana_1 = $aname_kana[0];
        $worker->name_kana_2 = $aname_kana[1];
		$abirthday = preg_split("/[\-\/\s:]+/", $worker->birthday);
        $worker->birthday_1 = $abirthday[0];
        $worker->birthday_2 = $abirthday[1];
        $worker->birthday_3 = $abirthday[2];
		
        return view("worker/edit_worker")->with([
            "worker" => $worker
        ]);
	}

	public function worker_editfinish(Request $request){
	    return view("worker/worker_editfinish");
	}
	
    public function list_order(Request $request){

        $now_order_list = DB::table("orders")->where("worker_id", Auth::id())->get();

        $order_list = [];
        foreach($now_order_list as $now){
             $order_list[] = $now;
        }

        return view("worker/list_order")->with([
            "order_list" => $order_list
        ]);
    }
	
    public function view_order(Request $request){

        if( $request->input("order_id") == ""){
            return redirect("worker/list_order");
        }

        $order_id = $request->input("order_id");
        $now_order = DB::table("orders")->where("id", $order_id)->get();

        // 該当するユーザーがいなかったらリダイレクト
        if($now_order == null){
            return redirect("worker/list_order");
        }
		
		$order = $now_order[0];
		$user_id = $order->user_id;
		$worker_id = $order->worker_id;
		$name = $order->worker_name;
		$date = date("Y/m/d H:i:s");

		if( $request->input("action") == "完了" ) {
			
			$status = $request->input("status");
			
			DB::table('orders')->where("id",$order_id)->update([
                'status' => $status,
            ]);
			
		}		
		
		if( $request->input("action") == "送信" ) {
			
			$content = $request->input("content");

			DB::table('talks')->insert([
                'order_id' => $order_id,
                'user_id' => $user_id,
                'worker_id' => $worker_id,
				'name' => $name,
				'date' => $date,
				'content' => $content,
            ]);
		}
		
		$conv_list = DB::table("talks")->where("order_id", $order_id)->get();
		
        return view("worker/view_order")->with([
            "order" => $order,
			"conv_list" => $conv_list,
        ]);
    }

    public function schedule(Request $request){

		$worker_id = Auth::id();

		if( $request->input("action") == "登録" ) {
			
			$date = $request->input("date");
			$start_time = $request->input("start_time");
			$end_time = $request->input("end_time");
			$condition = $request->input("condition");
			$bikou = $request->input("bikou");

			DB::table('schedules')->insert([
                'worker_id' => $worker_id,
                'date' => $date,
                'start_time' => $start_time,
				'end_time' => $end_time,
				'condition' => $condition,
				'bikou' => $bikou,
            ]);
		}
		
		$schedule_list = DB::table("schedules")->where("worker_id", $worker_id)->get();

        return view("worker/schedule")->with([
			"schedule_list" => $schedule_list,
        ]);
    }
	
    public function edit_schedule(Request $request){

        if( $request->input("id") == ""){
            return redirect("worker/schedule");
        }
		
		$id = $request->input("id");

		if( $request->input("action") == "更新" ) {
			
			$start_time = $request->input("start_time");
			$end_time = $request->input("end_time");
			$condition = $request->input("condition");
			$bikou = $request->input("bikou");

			DB::table('schedules')->where("id",$id)->update([
                'start_time' => $start_time,
				'end_time' => $end_time,
				'condition' => $condition,
				'bikou' => $bikou,
            ]);
		}
		
		$schedule_list = DB::table("schedules")->where("worker_id", $worker_id)->get();

        return view("worker/schedule")->with([
			"schedule_list" => $schedule_list,
        ]);
    }
	
    public function list_review(Request $request){
		
		$worker_id = Auth::id();
		
        $review_list = DB::table("reviews")->where("worker_id", $worker_id)->get();
		
        return view("worker/list_review")->with([
            "review_list" => $review_list
        ]);
    }
	
    public function view_karte(Request $request){

        if( $request->input("user_id") == ""){
            return redirect("worker/list_order");
        }

        $user_id = $request->input("user_id");
        $now_karte = DB::table("karte")->where("user_id", $user_id)->get();

        // 該当するユーザーがいなかったらリダイレクト
        if($now_karte == null){
            return redirect("worker/list_order");
        }
		
		$karte = $now_karte[0];
		
        return view("worker/view_karte")->with([
            "karte" => $karte,
        ]);
    }
	
    public function create_karte(Request $request){

        if( $request->input("user_id") == ""){
            return redirect("worker/list_order");
        }

        $user_id = $request->input("user_id");
		$worker_id = Auth::id();
        $now_karte = DB::table("karte")->where("user_id", $user_id)->get();
		
		$fake = DB::table("orders")->where("user_id", $user_id)->where("worker_id", $worker_id)->where("status", "依頼受付")->count();
		
		if( $fake == 0 ){
            return redirect("worker/list_order");
        }
		
		$karte = $now_karte[0];

        // 該当するユーザーがいなかったらリダイレクト
        if($now_karte == null){
            return redirect("worker/list_order");
        }
		
		if( $request->input("action") == "登録" ) {
			
			$content_1 = $request->input('content_1');
			$content_2 = $request->input('content_2');
			$content_3 = $request->input('content_3');
			$content_4 = $request->input('content_4');
			$content_5 = $request->input('content_5');
			$content_6 = $request->input('content_6');
			$content_7 = $request->input('content_7');
			
			$image_name1 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('content_8_path') != ""){
			$request->file('content_8_path')->move(
				base_path() . '/public/image/', $image_name1
			);
			$content_8_path = 'image/' . $image_name1;
			} else {
				$content_8_path = "";
			}
			$image_name2 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('content_8_path_2') != ""){
			$request->file('content_8_path_2')->move(
				base_path() . '/public/image/', $image_name2
			);
			$content_8_path_2 = 'image/' . $image_name2;
			} else {
				$content_8_path_2 = "";
			}
			$image_name3 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('content_9_path') != ""){
			$request->file('content_9_path')->move(
				base_path() . '/public/image/', $image_name3
			);
			$content_9_path = 'image/' . $image_name3;
			} else {
				$content_9_path = "";
			}
			$image_name4 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('content_9_path_2') != ""){
			$request->file('content_9_path_2')->move(
				base_path() . '/public/image/', $image_name4
			);
			$content_9_path_2 = 'image/' . $image_name4;
			} else {
				$content_9_path_2 = "";
			}
			
			$content_10 = $request->input('content_10');
			$content_11 = $request->input('content_11');
			$date = date("Y/m/d H:i:s");
			$status = "記入済";
			
            DB::table('karte')->where("user_id",$user_id)
				->update([
                'content_1' => $content_1,
				'content_2' => $content_2,
				'content_3' => $content_3,
				'content_4' => $content_4,
				'content_5' => $content_5,
				'content_6' => $content_6,
				'content_7' => $content_7,
				'content_8_path' => $content_8_path,
				'content_8_path_2' => $content_8_path_2,
				'content_9_path' => $content_9_path,
				'content_9_path_2' => $content_9_path_2,
				'content_10' => $content_10,
				'content_11' => $content_11,
                'date' => $date,
				'status' => $status,
            ]);
		}
		
        return view("worker/create_karte")->with([
            "karte" => $karte,
        ]);
    }
	
    public function create_report(Request $request){

        if( $request->input("order_id") == ""){
            return redirect("worker/list_order");
        }

        $order_id = $request->input("order_id");
		$now_order = DB::table("orders")->where("id", $order_id)->get();
		
        if($now_order == null){
            return redirect("worker/list_order");
        }		
		
		$order = $now_order[0];
		
		$worker_id = $order->worker_id;
		$worker_name = $order->worker_name;
		$user_id = $order->user_id;
		$user_name = $order->user_name;
        
		$fake = DB::table("orders")->where("user_id", $user_id)->where("worker_id", $worker_id)->count();
		
		if( $fake == 0 ){
            return redirect("worker/list_order");
        }
		
		if( $request->input("action") == "登録" ) {
			
			$content_1 = $request->input('content_1');
			$content_2 = $request->input('content_2');
			$content_3 = $request->input('content_3');
			$content_4 = $request->input('content_4');
			$content_5_path_1 = $request->input('content_5_path_1');
			$content_5_path_2 = $request->input('content_5_path_2');
			$content_5_path_3 = $request->input('content_5_path_3');
			$content_5_path_4 = $request->input('content_5_path_4');
			
			$image_name1 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('content_5_path_1') != ""){
			$request->file('content_5_path_1')->move(
				base_path() . '/public/image/', $image_name1
			);
			$content_5_path_1 = 'image/' . $image_name1;
			} else {
				$content_5_path_1 = "";
			}
			
			$image_name2 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('content_5_path_2') != ""){
			$request->file('content_5_path_2')->move(
				base_path() . '/public/image/', $image_name2
			);
			$content_5_path_2 = 'image/' . $image_name2;
			} else {
				$content_5_path_2 = "";
			}
			
			$image_name3 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('content_5_path_3') != ""){
			$request->file('content_5_path_3')->move(
				base_path() . '/public/image/', $image_name3
			);
			$content_5_path_3 = 'image/' . $image_name3;
			} else {
				$content_5_path_3 = "";
			}
			
			$image_name4 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('content_5_path_4') != ""){
			$request->file('content_5_path_4')->move(
				base_path() . '/public/image/', $image_name4
			);
			$content_5_path_4 = 'image/' . $image_name4;
			} else {
				$content_5_path_4 = "";
			}
			
			$date = date("Y/m/d H:i:s");
			
            DB::table('reports')->insert([
				'user_id' => $user_id,
				'user_name' => $user_name,
				'worker_id' => $worker_id,
				'worker_name' => $worker_name,
				'order_id' => $order_id,
                'content_1' => $content_1,
				'content_2' => $content_2,
				'content_3' => $content_3,
				'content_4' => $content_4,
				'content_5_path_1' => $content_5_path_1,
				'content_5_path_2' => $content_5_path_2,
				'content_5_path_3' => $content_5_path_3,
				'content_5_path_4' => $content_5_path_4,
                //'created_time' => $date,
                //'updated_time' => $date,
                'created_at' => $date,
				'updated_at' => $date,
            ]);
		}
		
        return view("worker/create_report")->with([
            "order" => $order,
        ]);
    }
	
    public function edit_karte(Request $request){

        if( $request->input("user_id") == ""){
            return redirect("worker/list_order");
        }

        $user_id = $request->input("user_id");
		$worker_id = Auth::id();
        $now_karte = DB::table("karte")->where("user_id", $user_id)->get();
		
		$fake = DB::table("orders")->where("user_id", $user_id)->where("worker_id", $worker_id)->where("status", "依頼受付")->count();
		
		if( $fake == 0 ){
            return redirect("worker/list_order");
        }
		
		$karte = $now_carte[0];
		$date = $karte->date;
		$date_1 = date('Y-m-d', strtotime('$date +3 days'));
		$date_2 = date('Y-m-d');
		
		if($date_2 > $date_1){
			return redirect("worker/list_order");
		}

        // 該当するユーザーがいなかったらリダイレクト
        if($now_karte == null){
            return redirect("worker/list_order");
        }
		
		if( $request->input("action") == "登録" ) {
			
			$content_1 = $request->input('content_1');
			$content_2 = $request->input('content_2');
			$content_3 = $request->input('content_3');
			$content_4 = $request->input('content_4');
			$content_5 = $request->input('content_5');
			$content_6 = $request->input('content_6');
			$content_7 = $request->input('content_7');			
			$content_10 = $request->input('content_10');
			$content_11 = $request->input('content_11');
			
            DB::table('karte')->where("user_id",$user_id)
				->update([
                'content_1' => $content_1,
				'content_2' => $content_2,
				'content_3' => $content_3,
				'content_4' => $content_4,
				'content_5' => $content_5,
				'content_6' => $content_6,
				'content_7' => $content_7,
				'content_10' => $content_10,
				'content_11' => $content_11,
            ]);
			
			return view("worker/view_karte")->with([
                 "karte" => $karte,
            ]);
		}

        return view("worker/edit_karte")->with([
            "karte" => $karte,
        ]);
    }
	
}
