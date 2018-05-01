<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\WorkerInfo;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class SearchDetailController extends Controller
{	
    public function search(Request $request){	
	
			if($request->input('action') == "検索"){
			
				$search_1 = $request->input('content_1');
				$search_2 = $request->input('content_2');
				$search_3 = $request->input('content_3');
				$search_4 = $request->input('content_4');
				$search_5 = $request->input('content_5');
				$search_6 = $request->input('content_6');
				$search_7 = $request->input('pref');
				$search_8 = $request->input('address_1');

                $query = WorkerInfo::query();
			
			    if(!empty($search_1)) {
                    $query->where('can_do_1', 'like', '%'.$search_1.'%');
                }
				if(!empty($search_2)) {
                    $query->where('can_do_2', 'like', '%'.$search_2.'%');
                }
				if(!empty($search_3)) {
                    $query->where('can_do_3', 'like', '%'.$search_3.'%');
                }
				if(!empty($search_4)) {
                    $query->where('can_do_4', 'like', '%'.$search_4.'%');
                }
				if(!empty($search_5)) {
                    $query->where('can_do_5', 'like', '%'.$search_5.'%');
                }
				if(!empty($search_6)) {
                    $query->where('can_do_6', 'like', '%'.$search_6.'%');
                }
				if(!empty($search_7)) {
                    $query->where('pref', 'like', '%'.$search_7.'%');
                }
				if(!empty($search_8)) {
                    $query->where('address_1', 'like', '%'.$search_8.'%');
                }
				
			    $worker_list = $query->paginate(10);
                return view('search_detail')->with([
                  "worker_list" => $worker_list,
               ]);
		    }
    }

}
