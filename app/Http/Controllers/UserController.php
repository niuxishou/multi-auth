<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function edit_user(Request $request){
		$user_id = Auth::id();
		if( $request->input("action") == "更新" ) {
		    $rules = [
		        'name_1' => 'required',
		        'name_2' => 'required',
		        'name_kana_1' => 'required',
		        'name_kana_2' => 'required',
		        'post' => 'required | digits:7',
		        'pref' => 'required',
		        'address_1' => 'required',
		        'address_2' => 'required',
		        'gender' => 'required',
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
		        'gender.required' => '性別は必ず入力してください。',
		        'email.required' => 'メールアドレスは必ず入力してください。',
		        'email.email' => 'メールアドレスを正しく入力してください。',
		        'tel.required' => '電話番号は必ず入力してください。',
		        'tel.digits_between' => '電話番号を半角数字で正しく入力してください。',
		    ];
		    
		    $validator = Validator::make($request->all(), $rules, $messages);
		    $email = $request->input("email");
		    $email_exists = false;
		    if (!$validator->errors()->has('email')) {
		        $email_cnt = DB::table('user_info')->where('email',  $email)
		        ->where('user_id', '<>', $user_id)
		        ->count();
		        if ($email_cnt > 0) {
		            $msg = "該当emailは他人より使われています。";
		            $validator->errors()->add('email', $msg);
		            $email_exists = true;
		        }
		    }
		    $errors = $validator->errors();
		    $request->flash();
		    if($validator->fails() || $email_exists) {
		        return redirect()->to("edit_user")->withErrors($errors)->withInput();
		    }
		    
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
			$gender = $request->input('gender');
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
				'gender' => $gender,
				'email' => $email,
                'tel' => $tel,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
			return redirect("edit_finish");
		}
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
        return view("edit_user")->with([
            "user" => $user
        ]);
	}	
	
    public function edit_finish(Request $request){
		return view("edit_finish");
	}
	
    public function list_order(Request $request){
        $user_id = Auth::id();
        $order_list = DB::table("orders")->where("user_id", $user_id)->get();
        return view("list_order")->with([
            "order_list" => $order_list
        ]);
    }
	
    public function view_order(Request $request){
        if( $request->input("order_id") == ""){
            return redirect("list_order");
        }
        $order_id = $request->input("order_id");
        $now_order = DB::table("orders")->where("id", $order_id)->get();
        // 該当するユーザーがいなかったらリダイレクト
        if($now_order == null){
            return redirect("/list_order");
        }
        $order = $now_order[0];

        $user_id = Auth::id();
		$worker_id = $order->worker_id;
		$name = $order->user_name;
		$date = date("Y/m/d H:i:s");
		
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
		return view("view_order")->with([
            "order" => $order,
			"conv_list" => $conv_list,
        ]);
    }
	
    public function point_history(Request $request){
        $user_id = Auth::id();
        $point_list = DB::table("point_purchases")
        ->where("user_id", $user_id)
        ->where("status", "付与完了")
        ->orderBy("updated_at", "desc")
        ->get();
        
        $num = $point_list->count();
        if($num==0){
            $msg = "検索結果が0件でした。";
        } else {
            $msg = "";
        }
        return view("point_history")->with([
            "point_list" => $point_list,
            "msg" => $msg,
        ]);
    }
    
    public function point_purchase(Request $request){
// 		if( $request->input("action") == "次へ" ) {
// 			return redirect("select_payment");
// 		}
        return view("point_purchase");
    }
	
//     public function post_payment(Request $request){
//         $points = $request->input("points");
//         $user_id = Auth::id();
//         $now_name = DB::table("user_info")->where("user_id", $user_id)->get();
//         $name = $now_name[0];
//         $date = date("Y/m/d H:i:s");
//         $data = $request->all();
//         return view("select_payment")->with($data);
//     }
    
    public function select_payment(Request $request){
		$data = $request->all();
        return view("select_payment")->with($data);
	}
	
    public function bank_payment(Request $request){
		$points = $request->input("points");
		$user_id = Auth::id();
		$now_name = DB::table("user_info")->where("user_id", $user_id)->get();
		$name = $now_name[0]->name;
		$date = date("Y/m/d H:i:s");
		if( $request->input("action") == "銀行振込" ) {
			$way = "銀行振込";
			$status = "振込待ち";
			DB::table('point_purchases')->insert([
                'user_id' => $user_id,
				'name' => $name,
				'request_date' => $date,
				'buy_points' => $points,
				'pay_way'  => $way,
				'status' => $status,
			    'created_at' => $date,
            ]);
		}
		return view("bank_payment");
    }
	
    public function credit_payment(Request $request){
		$points = $request->input("points");
		$user_id = Auth::id();
		$now_name = DB::table("user_info")->where("user_id", $user_id)->get();
		$name = $now_name[0]->name;
		$date = date("Y/m/d H:i:s");
		if( $request->input("action") == "クレジットカード決済" ) {
			$way = "カード決済";
			$status = "未確認";
			DB::table('point_purchases')->insert([
			    'user_id' => $user_id,
			    'name' => $name,
			    'request_date' => $date,
			    'buy_points' => $points,
			    'pay_way'  => $way,
			    'status' => $status,
			    'created_at' => $date,
            ]);
			
		}
		return view("credit_payment");
    }
	
}

