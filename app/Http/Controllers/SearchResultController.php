<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\WorkerInfo;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class SearchResultController extends Controller
{	
    public function search(Request $request){	
	
			if($request->input('action') == "検索"){
			$search = $request->input('pref');
			$name = $request->input('pref');
            $query = WorkerInfo::query();
			
			if(!empty($search)) {
               $query->where('pref', 'like', '%'.$search.'%');
            }
			
			$address = $query->pluck('address_1','id')->toArray();
		    $district = array_count_values($address);
			
			$date_dash = date("m/d");
			$date_1 = date('n/j', strtotime("+1 day"));
		    $date_2 = date('n/j', strtotime('+2 days'));
			$date_3 = date('n/j', strtotime('+3 days'));
			$date_4 = date('n/j', strtotime('+4 days'));
			$date_5 = date('n/j', strtotime('+5 days'));
			$date_6 = date('n/j', strtotime('+6 days'));
			$date_7 = date('n/j', strtotime('+7 days'));
				
            $worker_list = $query->paginate(10);
            return view('search_result')->with([
                  "worker_list" => $worker_list,
				  "name" => $name,
				  "district" => $district,
				  "date_1" => $date_1,
				  "date_2" => $date_2,
				  "date_3" => $date_3,
				  "date_4" => $date_4,
				  "date_5" => $date_5,
				  "date_6" => $date_6,
				  "date_7" => $date_7,
               ]);
		    }
    }

}
