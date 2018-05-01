<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\WorkerInfo;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class WelcomeController extends Controller
{

    public function index(Request $request){

        $now_worker_list = DB::table("worker_info")->orderBy('id', 'desc')->take(4)->get();

        $worker_list = [];
        foreach($now_worker_list as $now){
             $worker_list[] = $now;
        }
        return view("/welcome")->with([
            "worker_list" => $worker_list
        ]);
    }

    public function search(Request $request){

			if($request->input('action') == "検索"){
			$search = $request->input('pref');
            $query = WorkerInfo::query();

			if(!empty($search)) {
               $query->where('pref', 'like', '%'.$search.'%');
            }
               $worker_list = $query->paginate(10);
               return view('search_result')->with([
                   "worker_list" => $worker_list
               ]);
		    }
    }

}
