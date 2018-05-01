<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\User;
use App\WorkerInfo;

use Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class SearchPrefController extends Controller
{	
    public function search(Request $request, $pref){	
		
            $query = WorkerInfo::query();
		    $query->where('pref', 'like', '%'.$pref.'%');
		
		    $worker_pref = $pref;
		
            $worker_list = $query->paginate(10);
            return view('search_pref')->with([
                  "worker_list" => $worker_list,
				  "worker_pref" => $worker_pref,
            ]);
    }

}