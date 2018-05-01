<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Applicant;

//use Validator;
use \Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


Image::configure(['driver' => 'imagick']);

class ApplyController extends Controller
{
    public function apply(Request $request){
		
		if( $request->input("action") == "応募" ) {
			
			$rules = [
				'name_1' => 'required',
				'name_2' => 'required',
				'name_kana_1' => 'required',
				'name_kana_2' => 'required',
				'post' => 'required',
				'pref' => 'required',
				'address_1' => 'required',
				'address_2' => 'required',
				'email' => 'required | email',
				'tel' => 'required | digits_between:10,14',
				'kakuninfile_1' => 'required',
				'shikakufile_1' => 'required',
				'kekkaku' => 'required',
				'hihushikkan' => 'required',
				'job' => 'required',
				'job_2' => 'required',
				'job_3' => 'required',
			];
			
			$messages = [
				'name_1.required' => '名前（姓）は必ず入力してください。',
				'name_2.required' => '名前（名）は必ず入力してください。',
				'name_kana_1.required' => 'フリガナ（姓）は必ず入力してください。',
				'name_kana_2.required' => 'フリガナ（名）は必ず入力してください。',
				'post.required' => '郵便番号は必ず入力してください。',
				'pref.required' => '都道府県は必ず入力してください。',
				'address_1.required' => '市区町村は必ず入力してください。',
				'address_2.required' => '番地は必ず入力してください。',
				'email.required' => 'メールアドレスは必ず入力してください。',
				'email.email' => 'メールアドレスを正しい形式で入力してください',
				'tel.required' => '電話番号は必ず入力してください。',
				'tel.digits_between' => '電話番号を半角数字で正しく入力してください。',
				'kakuninfile_1.required' => '本人確認書類（表）は必ずアップロードしてください。',
				'shikakufile_1.required' => '理容師資格証明書（表）は必ずアップロードしてください。',
				'kekkaku.required' => '結核の有無は必ず回答してください。',
				'hihushikkan.required' => '皮膚疾患の有無は必ず回答してください。',
				'job.required' => '技術者デビューは必ず選択してください。',
				'job_2.required' => '一番長く勤めたお店の店名は必ず入力してください。',
				'job_3.required' => '一番長く勤めたお店の期間は必ず入力してください。',
			];
			
			$validator = Validator::make($request->all(), $rules, $messages);
			$errors = $validator->errors();
			
			$request->flash();
			
			if($validator->fails()) {
				return redirect('apply')->withErrors($validator)->withInput();
			}
			
			if($request->input('kekkaku') == "あり" || $request->input('hihushikkan') == "あり"){
				return redirect("sorry");
			}
			
			$name = $request->input('name_1') . "\t" . $request->input('name_2');
			$name_kana = $request->input('name_kana_1') . "\t" . $request->input('name_kana_2');
			$post = $request->input('post');
			$pref = $request->input('pref');
			$address_1 = $request->input('address_1');
			$address_2 = $request->input('address_2');
			if($request->input('address_3') != ""){
				$address_3 = $request->input('address_3');
			} else {
				$address_3 = "";
			}
			$gender = $request->input('gender');
			$birthday_1 = $request->input('birthday_1'); 
		    $birthday_2 = $request->input('birthday_2');
		    $birthday_3 = $request->input('birthday_3');
			$birthday = date("Y/m/d", mktime(0,0,0,$birthday_2,$birthday_3,$birthday_1));
			$email = $request->input('email');
			$tel = $request->input('tel');
			
			$image_name1 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('kakuninfile_1') != ""){
			$request->file('kakuninfile_1')->move(
				base_path() . '/public/image/', $image_name1
			);
			$kakuninfile_1_path = 'image/' . $image_name1;
			} else {
				$kakuninfile_1_path = "";
			}
			$kakuninfile_1 = '';
			
			$image_name2 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('kakuninfile_2') != ""){
			$request->file('kakuninfile_2')->move(
				base_path() . '/public/image/', $image_name2
			);
			$kakuninfile_2_path = 'image/' . $image_name2;
			} else {
				$kakuninfile_2_path = "";
			}
			$kakuninfile_2 = '';
			
			$image_name3 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('shikakufile_1') != ""){
			$request->file('shikakufile_1')->move(
				base_path() . '/public/image/', $image_name3
			);
			$shikakufile_1_path = 'image/' . $image_name3;
			} else {
				$shikakufile_1_path = "";
			}
            $shikakufile_1 = '';
			
			$image_name4 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('shikakufile_2') != ""){
			$request->file('shikakufile_2')->move(
				base_path() . '/public/image/', $image_name4
			);
			$shikakufile_2_path = 'image/' . $image_name4;
			} else {
				$shikakufile_2_path = "";
			}
            $shikakufile_2 = '';
			
			$image_name5 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('shikakufile_3') != ""){
			$request->file('shikakufile_3')->move(
				base_path() . '/public/image/', $image_name5
			);
			$shikakufile_3_path = 'image/' . $image_name5;
			} else {
				$shikakufile_3_path = "";
			}
			
			$image_name6 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('shikakufile_4') != ""){
			$request->file('shikakufile_4')->move(
				base_path() . '/public/image/', $image_name6
			);
			$shikakufile_4_path = 'image/' . $image_name6;
			} else {
				$shikakufile_4_path = "";
			}
			
			$image_name7 = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 60);
			if($request->file('shikakufile_5') != ""){
			$request->file('shikakufile_5')->move(
				base_path() . '/public/image/', $image_name7
			);
			$shikakufile_5_path = 'image/' . $image_name7;
			} else {
				$shikakufile_5_path = "";
			}
			
			$job = $request->input('job');
			$job_2 = $request->input('job_2');
			$job_3 = $request->input('job_3');
			if($request->input('pr') != ""){
				$pr = $request->input('pr');
			} else {
				$pr = "";
			}
			$status = "応募";
			$date = date("Y/m/d");
			$date_1 = date("Y-m-d");
			$a = (int)date('Ymd', strtotime($birthday));
			$b = (int)date('Ymd', strtotime($date));
			$age = (int)(($b-$a)/10000);
			
            DB::table('applicants')->insert([
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
				'kakuninfile_1' => $kakuninfile_1,
				'kakuninfile_1_path' => $kakuninfile_1_path,
				'kakuninfile_2' => $kakuninfile_2,
				'kakuninfile_2_path' => $kakuninfile_2_path,
				'shikakufile_1' => $shikakufile_1,
				'shikakufile_1_path' => $shikakufile_1_path,
				'shikakufile_2' => $shikakufile_2,
				'shikakufile_2_path' => $shikakufile_2_path,
                'job' => $job,
				'job_2' => $job_2,
				'job_3' => $job_3,
                'pr' => $pr,
				'score_1' => 0,
				'score_2' => 0,
				'score_3' => 0,
				'score_4' => 0,
				'score_5' => 0,
				'score_6' => 0,
				'score_7' => 0,
				'score_age' => '',
				'score_biko' => '',
				'status' => $status,
				//'created_time' => $date_1,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
			
		    \Mail::send(new \App\Mail\Contact([
                'to' => $email,
                'to_name' => $name,
                'from' => 'deutschsiegteworldcup@gmail.com',
                'from_name' => 'ルーム・サロン',
                'subject' => 'ルーム・サロンへのご応募ありがとうございます',
                'name' => $name,
				'name_kana' => $name_kana,
                'gender' => $gender,
				'address' => $address_1,
				'email' => $email,
				'tel' => $tel,
                'job' => $job
            ], 'applyto'));
			
			\Mail::send(new \App\Mail\Contact([
                'to' => 'deutschsiegteworldcup@gmail.com',
                'to_name' => 'ルーム・サロン',
                'from' => $email,
                'from_name' => $name,
                'subject' => '理容師からの応募がありました',
                'name' => $name,
				'name_kana' => $name_kana,
                'gender' => $gender,
				'address' => $address_1,
				'email' => $email,
				'tel' => $tel,
                'job' => $job,
				'pr' => $pr,
            ], 'applyfrom'));
			
			return redirect("thankyouforapplying");
		}
		
		return redirect("apply");
	}
}
