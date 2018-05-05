<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Worker;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CreateReviewController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function create_review(Request $request){
        if( $request->input("order_id") == ""){
            return redirect("list_order");
        }
        $order_id = $request->input("order_id");
		$user_id = Auth::id();
        $now_order = DB::table("orders")->where("id", $order_id)->get();
        // 該当するユーザーがいなかったらリダイレクト
        if($now_order == null){
            return redirect("list_order");
        }
		$order = $now_order[0];
		$user_id_2 = $order->user_id;
		$user_name = $order->user_name;
		if($user_id != $user_id_2){
            return redirect("list_order");
        }
		
		$worker_id = $order->worker_id;
		$date = date("Y/m/d H:i:s");		
		$msg = "";
		if( $request->input("action") == "送信" ) {
			$rate = $request->input("rate");
			$content = $request->input("content");
			DB::table('reviews')->insert([
                'worker_id' => $worker_id,
			    'user_id' => $user_id,
			    'user_name' => $user_name,
			    'rate' => $rate,
			    'content' => $content,
			    'created_at' => $date,
				'updated_at' => $date,
            ]);
			$msg = "レビューの投稿が完了しました。";
		}
        return view("create_review")->with([
            "order" => $order,
			"msg" => $msg,
        ]);
    }

}
