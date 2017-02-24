<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;

use App\Doctor;

use App\Specialty;

class SearchController extends Controller
{
    // 
    
    public function getResults(Request $request)
    {
    	if($request->has('location', 'specialty')){

    		$doctors = Specialty::find($request->specialty)->doctors()->where('location_id', $request->location);

    	}elseif($request->has('location')){

    		$doctors = Doctor::where('location_id', $request->location);

    	}elseif ($request->has('specialty')) {

    		$doctors = Specialty::find($request->specialty)->doctors();

    	}else{ 

    		return back();
    	}

    
    	

    						
    	return view('front-page.search.result', [ 

    		'doctors' => $doctors->paginate(5)->appends(['location' => $request->get('location'), 'specialty' => $request->get('specialty')])
    	]);
    }
}
