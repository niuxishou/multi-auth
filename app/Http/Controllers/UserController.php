<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Applicant;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function edit_user(Request $request){
		
		$user_id = Auth::id();
        $now_user = DB::table("user_info")->where("user_id", $user_id)->get();

        // 該当するユーザーがいなかったらリダイレクト
        if($now_user == null){
            return redirect("home");
        }
		
		$user = $now_user[0];
		
		$aname = preg_split("/[\s,]+/", $user->name);
		$user->name_1 = $aname[0];
        $user->name_2 = $aname[1];
		
		$aname_kana = preg_split("/[\s,]+/", $user->name_kana);
		$user->name_kana_1 = $aname_kana[0];
        $user->name_kana_2 = $aname_kana[1];
		
		$abirthday = preg_split("/[\-\/\s:]+/", $user->birthday);
        $user->birthday_1 = $abirthday[0];
        $user->birthday_2 = $abirthday[1];
        $user->birthday_3 = $abirthday[2];
		
		if( $request->input("action") == "更新" ) {
			
			$name = $request->input('name_1') . "\t" . $request->input('name_2');
			$name_kana = $request->input('name_kana_1') . "\t" . $request->input('name_kana_2');
			$post = $request->input('post');
			$pref = $request->input('pref');
			$address_1 = $request->input('address_1');
			$address_2 = $request->input('address_2');
			if($request->input('address_3') !=""){
				$address_3 = $request->input('address_3');
			} else {
				$address_3 = "";
			}
			$email = $request->input('email');
			$tel = $request->input('tel');
			$date = date("Y/m/d H:i:s");
			
			DB::table('users')->where("id",$user_id)
				->update([
				'name' => $name,
				'email' => $email,
			]);
			
            DB::table('user_info')->where("user_id",$user_id)
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
                'created_at' => $date,
                'updated_at' => $date,
            ]);
			
			return redirect("edit_finish");
		}
		
        return view("edit_user")->with([
            "user" => $user
        ]);
	}	
	
    public function edit_finish(Request $request){
		return view("edit_finish");
	}
	
    public function list_order(Request $request){

        $now_order_list = DB::table("orders")->where("user_id", Auth::id())->get();

        $order_list = [];
        foreach($now_order_list as $now){
             $order_list[] = $now;
        }

        return view("list_order")->with([
            "order_list" => $order_list
        ]);
    }
	
    public function view_order(Request $request){

        if( $request->input("order_id") == ""){
            return redirect("list_order");
        }

        $order_id = $request->input("order_id");
		$user_id = Auth::id();
        $now_order = DB::table("orders")->where("id", $order_id)->get();

        // 該当するユーザーがいなかったらリダイレクト
        if($now_order == null){
            return redirect("/list_order");
        }
		
		$order = $now_order[0];
		$worker_id = $order->worker_id;
		$name = $order->user_name;
		$date = date("Y/m/d H:i:s");
		$conv_list = DB::table("talks")->where("order_id", $order_id)->get();
		
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
		
        return view("view_order")->with([
            "order" => $order,
			"conv_list" => $conv_list,
        ]);
    }
	
    public function point_purchase(Request $request){
		
		if( $request->input("action") == "次へ" ) {
			return redirect("select_payment");
		}

        return view("point_purchase");
    }
	
    public function point_history(Request $request){
		
		return view("point_history");
		
	}	
	
    public function select_payment(Request $request){
		
		$data = $request->all();

        return view("select_payment")->with($data);
		
	}
	
	public function post_payment(Request $request){
		
		$points = $request->input("points");
		
		$user_id = Auth::id();
		$now_name = DB::table("user_info")->where("user_id", $user_id)->get();
		$name = $now_name[0];
		
		$date = date("Y/m/d H:i:s");		
		
		$data = $request->all();

        return view("select_payment")->with($data);
    }
	
    public function bank_payment(Request $request){
		
		$points = $request->input("points");
		
		$user_id = Auth::id();
		$now_name = DB::table("user_info")->where("user_id", $user_id)->get();
		$name = $now_name[0]->name;
		
		$date = date("Y/m/d");
		
		if( $request->input("action") == "銀行振込" ) {
			
			$way = "銀行振込";
			$status = "振込待ち";

			DB::table('point_purchases')->insert([
                'user_id' => $user_id,
				'name' => $name,
				'date' => $date,
				'points' => $points,
				'way'  => $way,
				'status' => $status,
            ]);
			
		}
		
		return view("bank_payment");
    }
	
    public function credit_payment(Request $request){
		
		$points = $request->input("points");
		
		$user_id = Auth::id();
		$now_name = DB::table("user_info")->where("user_id", $user_id)->get();
		$name = $now_name[0]->name;
		
		$date = date("Y/m/d");		
		
		if( $request->input("action") == "クレジットカード決済" ) {
			
			$points = $request->input("points");
			$way = "カード決済";
			$status = "未確認";

			DB::table('point_purchases')->insert([
                'user_id' => $user_id,
				'name' => $name,
				'date' => $date,
				'points' => $points,
				'way'  => $way,
				'status' => $status,
            ]);
			
		}
		return view("credit_payment");
    }
	
}

