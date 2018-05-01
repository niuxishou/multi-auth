<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\Http\Controllers\Controller;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;

class SignupController extends Controller
{
    public function signup(Request $request){
		if( $request->input("action") == "登録" ) {
			$rules = [
				'name_1' => 'required',
				'name_2' => 'required',
				'name_kana_1' => 'required',
				'name_kana_2' => 'required',
			    'email' => 'required | email',
			    'password' => 'required | confirmed',
				'tel' => 'required',
				'post' => 'required',
				'pref' => 'required',
				'address_1' => 'required',
				'address_2' => 'required',
			];
			
			$messages = [
				'name_1.required' => '名前（姓）は必ず入力してください。',
				'name_2.required' => '名前（名）は必ず入力してください。',
				'name_kana_1.required' => 'フリガナ（姓）は必ず入力してください。',
				'name_kana_2.required' => 'フリガナ（名）は必ず入力してください。',
			    'email.required' => 'メールアドレスは必ず入力してください。',
			    'email.email' => 'メールアドレスを正しく入力してください。',
			    'password.required' => 'パスワード必ず入力してください。',
			    'password.confirmed' => 'パスワードが確認用と違います。',
				'tel.required' => '電話番号は必ず入力してください。',
				'post.required' => '郵便番号は必ず入力してください。',
				'pref.required' => '都道府県は必ず入力してください。',
				'address_1.required' => '市区町村は必ず入力してください。',
				'address_2.required' => '番地は必ず入力してください。',
			];
			
			$validator = Validator::make($request->all(), $rules, $messages);
			$errors = $validator->errors();
			
			if($validator->fails()) {
				return redirect('signup')->withErrors($validator)->withInput();
			}
			
			$name = $request->input('name_1') . "\t" . $request->input('name_2');
			$name_kana = $request->input('name_kana_1') . "\t" . $request->input('name_kana_2');
			$email = $request->input('email');
			//$password = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 7);
			$password = bcrypt($request->input('password'));
            User::create([
                'name' => $name,
                'email' => $email,
                'password' => bcrypt($password),
            ]);
			
			$user_id = DB::table('users')->where('email',  $email)->get()[0]->id;
			$tel = $request->input('tel');
			$gender = $request->input('gender');
			$birthday_1 = $request->input('birthday_1'); 
		    $birthday_2 = $request->input('birthday_2');
		    $birthday_3 = $request->input('birthday_3');
			$birthday = date("Y/m/d", mktime(0,0,0,$birthday_2,$birthday_3,$birthday_1));
			$post = $request->input('post');
			$pref = $request->input('pref');
			$points = 0;
			$address_1 = $request->input('address_1');
			$address_2 = $request->input('address_2');
			if($request->input('address_3') != ""){
				$address_3 = $request->input('address_3');
			} else {
				$address_3 = "";
			}
			
			$date = date("Y/m/d H:i:s");
			$date_1 = date("Y-m-d");
			$a = (int)date('Ymd', strtotime($birthday));
			$b = (int)date('Ymd', strtotime($date));
			$age = (int)(($b-$a)/10000);
			$status = "初回";
			
            DB::table('user_info')->insert([
				'user_id' => $user_id,
                'name' => $name,
                'name_kana' => $name_kana,
                'post' => $post,
                'pref' => $pref,
                'address_1' => $address_1,
				'address_2' => $address_2,
				'address_3' => $address_3,
				'gender' => $gender,
                'birthday' => $birthday,
				'age' => $age,
				'email' => $email,
                'tel' => $tel,
				'points' => $points,
                'created_at' => $date,
                'updated_at' => $date,
				'delete_flag' => '0',
            ]);
			
// 			DB::table('karte')->insert([
// 				'order_id' => "",
// 				'user_id' => $user_id,
//                 'user_name' => $name,
//                 'worker_id' => "",
//                 'worker_name' => "",
// 				'content_1' => "",
// 				'content_2' => "",
// 				'content_3' => "",
// 				'content_4' => "",
// 				'content_5' => "",
// 				'content_6' => "",
// 				'content_7' => "",
// 				'content_8_path' => "",
// 				'content_9_path' => "",
// 				'content_8_path_2' => "",
// 				'content_9_path_2' => "",
// 				'content_10' => "",
// 				'content_11' => "",
// 				'date' => $date_1,
// 				'status' => $status,
//             ]);
			
// 		    \Mail::send(new \App\Mail\Contact([
//                 'to' => 'ecnaviresearch@yahoo.co.jp',
//                 'to_name' => $name,
//                 'from' => 'deutschsiegteworldcup@gmail.com',
//                 'from_name' => 'ルーム・サロン',
//                 'subject' => '会員登録いただきありがとうございます',
//                 'name' => $name,
// 				'name_kana' => $name_kana,
//                 'gender' => $gender,
// 				'email' => $email,
// 				'tel' => $tel,
//                 'password' => $password,
//             ], 'signupto'));			
			
			return redirect("thankyou");
		}
		return redirect("signup")->withInput();
	}
}
