<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;

class LocationController extends Controller
{
    //
    //
    

    public function index()
    {	
    	$locations = Location::all();

    	return view('admin.location.index', compact('locations'));
    }

    /**
     * [create description]
     * 
     * @return [type] [description]
     * 
     */
    

    public function create()
    {
    	return view('admin.location.create');
    }



    public function store(Request $request)
    {
    	$this->validate($request, [ 

    		'location' => 'required|unique:locations'
    	]);


    	Location::create($request->all());


    	return [ 

    		'success' => true,

    		'message' => 'Your data has been inserted'
    	];

    }


    public function edit(Location $location)
    {
    	return view('admin.location.edit', compact('location'));
    }



    public function update(Request $request, Location $location)
    {
    	$this->validate($request, [ 

    		'location' => 'required|unique:locations'
    	]);



    	$location->update($request->all());


    	return [ 
    		'success' =>  true,

    		'message' => 'Your data has been updated'
    	];
    }


    public function destroy(Location $location)
    {
    	$location->delete();

    	return [ 

    		'success' => true,
    		'message' => 'Your data has been deleted'
    	];
    }
}
