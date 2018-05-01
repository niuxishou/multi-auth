<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\Validator;
use App\Worker;
use App\WorkerInfo;
use App\Order;
use App\PointPurchase;

use App\Applicant;
use Intervention\Image\ImageManagerStatic as Image;

class StylistAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:stylistadmin');
    }
	
    public function list_applicant(Request $request){
        $applicant_list = DB::table("applicants")->paginate(10);
        
        $name = "";
        $pref = "";
        $address_1 = "";
        $status = "";
        $msg = "";
        
        if($request->input('action') == "検索"){
            $search1 = $request->input('name');
            $name = $search1;
            $search2 = $request->input('pref');
            $pref = $search2;
            if($request->old('pref')!=""){
                $pref = $request->old('pref');
            }
            $search3 = $request->input('address_1');
            $address_1 = $search3;
            $search4 = $request->input('status');
            $status = $search4;
            //$query = Applicant::query();
            $query = DB::table("applicants");
            
            if(!empty($search1)) {
                $query->where('name', 'like', '%'.$search1.'%')->paginate(10);
            }
            if(!empty($search2)) {
                $query->where('pref', 'like', '%'.$search2.'%')->paginate(10);
            }
            if(!empty($search3)) {
                $query->where('address_1', 'like', '%'.$search3.'%')->paginate(10);
            }
            if(!empty($search4)) {
                $query->where('status', 'like', '%'.$search4.'%')->paginate(10);
            }
            $applicant_list = $query->paginate(10);
            $num = $query->count();
            
            if($num == 0 && $request->input('page')<2){
                $msg = "検索結果は0件でした。";
            } else {
                $msg = "";
            }
        }
        return view("stylistadmin/list_applicant")->with([
            "applicant_list" => $applicant_list,
            "name" => $name,
            "pref" => $pref,
            "address_1" => $address_1,
            "status" => $status,
            "msg" => $msg,
        ]);
    }
	
    public function edit_applicant(Request $request){
        if( $request->input("applicant_id") == ""){
            return redirect("/stylistadmin/list_applicant");
        }
        $applicant_id = $request->input("applicant_id");
        
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
                return redirect()->to("stylistadmin/edit_applicant?applicant_id={$applicant_id}")->withErrors($validator)->withInput();
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
            
            DB::table('applicants')->where("id", $applicant_id)
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
        }
        $now_applicant = DB::table("applicants")->where("id", $applicant_id)->get();
        
        // 該当するユーザーがいなかったらリダイレクト
        if(is_null($now_applicant)){
            return redirect("/stylistadmin/list_applicant");
        }
        
        $applicant = $now_applicant[0];
        
        $aname = preg_split("/[\s,]+/", $applicant->name);
        $applicant->name_1 = $aname[0];
        $applicant->name_2 = $aname[1];
        
        $aname_kana = preg_split("/[\s,]+/", $applicant->name_kana);
        $applicant->name_kana_1 = $aname_kana[0];
        $applicant->name_kana_2 = $aname_kana[1];
        
        $abirthday = preg_split("/[\-\/\s:]+/", $applicant->birthday);
        $applicant->birthday_1 = $abirthday[0];
        $applicant->birthday_2 = $abirthday[1];
        $applicant->birthday_3 = $abirthday[2];
        return view("stylistadmin/edit_applicant")->with([
            "applicant" => $applicant
        ]);
    }
	
    public function interview_applicant(Request $request){
        if( $request->input("applicant_id") == ""){
            return redirect("/stylistadmin/list_applicant");
        }
        
        $applicant_id = $request->input("applicant_id");
        $now_applicant = DB::table("applicants")->where("id", $applicant_id)->get();
        
        // 該当するユーザーがいなかったらリダイレクト
        if(is_null($now_applicant)){
            return redirect("/stylistadmin/list_applicant");
        }
        
        $applicant = $now_applicant[0];
        
        $abirthday = preg_split("/[\-\/\s:]+/", $applicant->birthday);
        $applicant->birthday_1 = $abirthday[0];
        $applicant->birthday_2 = $abirthday[1];
        $applicant->birthday_3 = $abirthday[2];
        
        if($request->input('action') == "結果登録"){
            $rules = [
                'score_1' => 'required',
                'score_2' => 'required',
                'score_3' => 'required',
                'score_4' => 'required',
                'score_5' => 'required',
                'score_6' => 'required',
                'score_7' => 'required',
                'score_age' => 'required',
                'taiou_area' => 'required',
                'taiou_area_2' => 'required',
                'status' => 'required',
            ];
            
            $messages = [
                'score_1.required' => 'カットの評価は必ず入力してください。',
                'score_2.required' => 'カラーの評価は必ず入力してください。',
                'score_3.required' => 'パーマの評価は必ず入力してください。',
                'score_4.required' => '縮毛矯正の評価は必ず入力してください。',
                'score_5.required' => 'エクステの評価は必ず入力してください。',
                'score_6.required' => 'ヘアセットの評価は必ず入力してください。',
                'score_7.required' => '会話の評価は必ず入力してください。',
                'score_age.required' => '対応年齢層は必ず入力してください。',
                'taiou_area.required' => '対応エリア（都道府県）は必ず入力してください。',
                'taiou_area_2.required' => '対応エリア（市区町村）の評価は必ず入力してください。',
                'status.required' => '合格結果は必ず入力してください。',
            ];
            
            $validator = Validator::make($request->all(), $rules, $messages);
            $errors = $validator->errors();
            
            //$request->flash();
            
            if($validator->fails()) {
                return redirect()->to("stylistadmin/interview_applicant?applicant_id={$applicant_id}")
                ->withErrors($validator)->withInput();
            }
            
            $score_1 = $request->input('score_1');
            $score_2 = $request->input('score_2');
            $score_3 = $request->input('score_3');
            $score_4 = $request->input('score_4');
            $score_5 = $request->input('score_5');
            $score_6 = $request->input('score_6');
            $score_7 = $request->input('score_7');
            $score_age = $request->input('score_age');
            if($request->input('score_biko') == ""){
                $score_biko = "";
            } else {
                $score_biko = $request->input('score_biko');
            }
            $status = $request->input('status');
            $date = date("Y/m/d H:i:s");
            
            if($request->input('fuka_1') == "1"){
                $can_do_1 = "";
            } else {
                $can_do_1 = "カット";
            }
            if($request->input('fuka_2') == "1"){
                $can_do_2 = "";
            } else {
                $can_do_2 = "カラー";
            }
            if($request->input('fuka_3') == "1"){
                $can_do_3 = "";
            } else {
                $can_do_3 = "パーマ";
            }
            if($request->input('fuka_4') == "1"){
                $can_do_4 = "";
            } else {
                $can_do_4 = "縮毛矯正";
            }
            if($request->input('fuka_5') == "1"){
                $can_do_5 = "";
            } else {
                $can_do_5 = "エクステ";
            }
            if($request->input('fuka_6') == "1"){
                $can_do_6 = "";
            } else {
                $can_do_6 = "ヘアセット";
            }
            $can_do_7 = "";
            $can_do = "";
            $profile_img_path ="";
            
            DB::table('applicants')->where("id", $applicant_id)
            ->update([
                'score_1' => $score_1,
                'score_2' => $score_2,
                'score_3' => $score_3,
                'score_4' => $score_4,
                'score_5' => $score_5,
                'score_6' => $score_6,
                'score_7' => $score_7,
                'score_age' => $score_age,
                'score_biko' => $score_biko,
                'status' => $status,
                'updated_at' => $date,
            ]);
            if($status == "面接合格"){
                $name = $request->input('name');
                $name_kana = $request->input('name_kana');
                $email = $request->input('email');
                $password = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, 7);
                
                Worker::create([
                    'name' => $name,
                    'email' => $email,
                    'password' => bcrypt($password),
                ]);
                
                $worker_id = DB::table('workers')->where('email',  $email)->get()[0]->id;
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
                $job = $request->input('job');
                $job_2 = $request->input('job_2');
                $job_3 = $request->input('job_3');
                $tel = $request->input('tel');
                $birthday = $request->input('birthday');
                $date_1 = date("Y-m-d");
                $date = date("Y/m/d H:i:s");
                $a = (int)date('Ymd', strtotime($birthday));
                $b = (int)date('Ymd', strtotime($date));
                $age = (int)(($b-$a)/10000);
                
                $points = 0;
                $selfpr = "";
                $profile = "";
                $condition = "";
                $taiou_area = $request->input('taiou_area');
                $taiou_area_2 = $request->input('taiou_area_2');
                
                DB::table('worker_info')->insert([
                    'worker_id' => $worker_id,
                    'applicant_id' => $applicant_id,
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
                    'score_1' => $score_1,
                    'score_2' => $score_2,
                    'score_3' => $score_3,
                    'score_4' => $score_4,
                    'score_5' => $score_5,
                    'score_6' => $score_6,
                    'score_7' => $score_7,
                    'can_do' => $can_do,
                    'can_do_1' => $can_do_1,
                    'can_do_2' => $can_do_2,
                    'can_do_3' => $can_do_3,
                    'can_do_4' => $can_do_4,
                    'can_do_5' => $can_do_5,
                    'can_do_6' => $can_do_6,
                    'can_do_7' => $can_do_7,
                    'taiou_area' => $taiou_area,
                    'taiou_area_2' => $taiou_area_2,
                    'score_age' => $score_age,
                    'score_biko' => $score_biko,
                    'job' => $job,
                    'job_2' => $job_2,
                    'job_3' => $job_3,
                    'points' => $points,
                    'selfpr' => $selfpr,
                    'profile' => $profile,
                    'condition' => $condition,
                    //'created_time' => $date_1,
                    'created_at' => $date,
                    'updated_at' => $date,
                    'profile_img_path' => $profile_img_path,
                    'delete_flag' => '0',
                ]);
                
                DB::table('applicants')->where("id", $applicant_id)
                ->update([
                    'status' => "ワーカー登録済",
                ]);
                
                // 				\Mail::send(new \App\Mail\Contact([
                // 					'to' => 'k-smallfield3271@docomo.ne.jp',
                // 					'to_name' => $name,
                // 					'from' => 'deutschsiegteworldcup@gmail.com',
                // 					'from_name' => 'ルーム・サロン',
                // 					'subject' => 'ルーム・サロンへのご応募ありがとうございます',
                // 					'email' => $email,
                // 					'name' => $name,
                // 					'password' => $password,
                // 				], 'passed'));
            }
            //return redirect("admin/worker_finish");
            return view("stylistadmin/worker_finish");
        }
        
        return view("stylistadmin/interview_applicant")->with([
            "applicant" => $applicant
        ]);
    }
    
    public function list_worker(Request $request){
        $worker_list = DB::table("worker_info")->paginate(10);
        $name = "";
        $pref = "";
        $msg = "";
        if($request->input('action') == "検索"){
            $search1 = $request->input('name');
            $name = $search1;
            $search2 = $request->input('pref');
            $pref = $search2;
//             if($request->old('pref')!=""){
//                 $pref = $request->old('pref');
//             }
            //$query = WorkerInfo::query();
            $query = DB::table("worker_info");
            if(!empty($search1)) {
                $query->where('name', 'like', '%'.$search1.'%');
            }
            if(!empty($search2)) {
                $query->where('pref', 'like', '%'.$search2.'%');
            }
            $worker_list = $query->paginate(10);
            $num = $query->count();
            if($num == 0 && $request->input('page')<2){
                $msg = "検索結果は0件でした。";
            } else {
                $msg = "";
            }
        }
        return view("stylistadmin/list_worker")->with([
            "worker_list" => $worker_list,
            "name" => $name,
            "pref" => $pref,
            "msg" => $msg,
        ]);
    }
    
    public function view_worker(Request $request){
        if( $request->input("worker_id") == ""){
            return redirect("/stylistadmin/list_worker");
        }
        
        $worker_id = $request->input("worker_id");
        $now_worker = DB::table("worker_info")->where("id", $worker_id)->get();
        // 該当するユーザーがいなかったらリダイレクト
        if($now_worker == null){
            return redirect("/stylistadmin/list_worker");
        }
        $worker = $now_worker[0];
        
        $applicant_id = $worker->applicant_id;
        $applicant = DB::table("applicants")->where("id", $applicant_id)->first();
        if($applicant == null){
            return redirect("/stylistadmin/list_worker");
        }
        
        return view("stylistadmin/view_worker")->with([
            "worker" => $worker,
            "applicant" => $applicant,
        ]);
    }
    
    public function edit_worker(Request $request){
        if( $request->input("worker_id") == ""){
            return redirect("/stylistadmin/list_worker");
        }
        
        $worker_id = $request->input("worker_id");
        
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
                return redirect()->to("stylistadmin/edit_worker?worker_id={$worker_id}")->withErrors($validator)->withInput();
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
            
            DB::table('worker_info')->where("id", $worker_id)
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
            return redirect("stylistadmin/worker_editfinish");
        }
        
        $now_worker = DB::table("worker_info")->where("id", $worker_id)->get();
        // 該当するユーザーがいなかったらリダイレクト
        if($now_worker == null){
            return redirect("/stylistadmin/list_worker");
        }
        $worker = $now_worker[0];
        
        $now_work = DB::table("workers")->where("id",$worker->worker_id)->get();
        $work = $now_work[0];
        
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
        
        return view("stylistadmin/edit_worker")->with([
            "worker" => $worker,
            "work" => $work,
        ]);
    }
    
    public function worker_editfinish(Request $request){
        return view("stylistadmin/worker_editfinish");
    }
    
    public function list_order(Request $request){
        $order_list = DB::table("orders")->paginate(10);
        $user_name="";
        $worker_name="";
        $status = "";
        $msg = "";
        return view("stylistadmin/list_order")->with([
            "order_list" => $order_list,
            "user_name" => $user_name,
            "worker_name" => $worker_name,
            "status" => $status,
            "msg" => $msg,
        ]);
    }
    
    public function search_order(Request $request){
        if($request->input('action') == "検索"){
            $search1 = $request->input('user_name');
            $user_name = $search1;
            $search2 = $request->input('worker_name');
            $worker_name = $search2;
            $search3 = $request->input('status');
            $status = $search3;
            //$query = Order::query();
            $query = DB::table("orders");
            
            if(!empty($search1)) {
                $query->where('user_name', 'like', '%'.$search1.'%');
            }
            if(!empty($search2)) {
                $query->where('worker_name', 'like', '%'.$search2.'%');
            }
            if(!empty($search3)) {
                $query->where('status', 'like', '%'.$search3.'%');
            }
            $order_list = $query->paginate(10);
            $num = $query->count();
            
            if($num==0){
                $msg="検索結果は0件でした。";
            } else {
                $msg="";
            }
            
            return view('stylistadmin/list_order')->with([
                "order_list" => $order_list,
                "user_name" => $user_name,
                "status" => $status,
                "worker_name" => $worker_name,
                "msg" => $msg,
            ]);
        }
    }
    
    public function view_order(Request $request){
        if( $request->input("order_id") == ""){
            return redirect("/stylistadmin/list_order");
        }
        $order_id = $request->input("order_id");
        $now_order = DB::table("orders")->where("id", $order_id)->get();
        // 該当するユーザーがいなかったらリダイレクト
        if($now_order == null){
            return redirect("/stylistadmin/list_order");
        }
        
        $order = $now_order[0];
        $now_user = DB::table("users")->where("id", $order->user_id)->get();
        if($now_user == null){
            return redirect("/stylistadmin/list_order");
        }
        
        $now_worker = DB::table("workers")->where("id", $order->worker_id)->get();
        if($now_worker == null){
            return redirect("/stylistadmin/list_order");
        }
        
        $user = $now_user[0];
        $worker = $now_worker[0];
        
        return view("stylistadmin/view_order")->with([
            "order" => $order,
            "user" => $user,
            "worker" => $worker,
        ]);
    }
}
