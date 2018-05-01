<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\WorkerInfo;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class SearchDistrictController extends Controller
{	
    public function search(Request $request, $district){	
		
            $query = WorkerInfo::query();
		    $query->where('address_1', 'like', '%'.$district.'%');
		
		    $worker_dis = $district;
		
            $worker_list = $query->paginate(10);
            return view('search_district')->with([
                  "worker_list" => $worker_list,
				  "worker_dis" => $worker_dis,
            ]);
    }

}