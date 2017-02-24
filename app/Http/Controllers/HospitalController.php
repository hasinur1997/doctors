<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Hospital;

use App\Number;

class HospitalController extends Controller
{
    /**
	 * index page show all hopital list
	 * 
	 * @return array
	 */
	

    public function index()
    {
        $hospitals = Hospital::all();



    	return view('admin.hospital.index', compact('hospitals'));
    }




    /**
     * create hospital form
     * 
     * @return form
     */
    

    public function create()
    {
    	return view('admin.hospital.create');
    }



    /**
     * store all request data
     * 
     * @return void
     */
    

    public function store(Request $request)
    {

    	$this->validate($request, [  

    		'hospital_name' => 'required|unique:hospitals',

    		'location' => 'required',

    		'phone_number' => 'required'
    	]);

        $number = implode(', ', $request->phone_number);


         Hospital::create([ 

           'hospital_name' => $request->hospital_name,

           'location' => $request->location,

           'phone_number' => $number,

        ]);


        return [
            'success' => true,
            'message' => 'Your record has been added'
        ];
        
    }




    /**
     * Get the edit form
     * 
     * @param  Hospital $hospital [description]
     * 
     * @return mixed            
     */
    
    public function edit(Hospital $hospital)
    {
        $phone_number = explode(', ', $hospital->phone_number);

        return view('admin.hospital.edit', compact('hospital', 'phone_number'));
    }




    /**
     * update hospital content
     * 
     * @param  Request $request [description]
     * 
     * @param  [type]  $id      [description]
     * 
     * @return mixed
     * 
     */
    

    public function update(Request $request, $id)
    {
       
        $hospital = Hospital::find($id);

        $this->validate($request, [  

            'hospital_name' => 'required',

            'location' => 'required',

            'phone_number' => 'required'
        ]);

        $number = implode(', ', $request->phone_number);

        $hospital->hospital_name = $request->hospital_name;

        $hospital->location = $request->location;

        $hospital->phone_number = $number;

        $hospital->save();


        return redirect()->route('hospitals.index')

        ->with('flash_notification.message', 'You have success fully updated your record')

        ->with('flash_notification.level', 'success');

        
    }




    public function destroy(Hospital $hospital)
    {

        $hospital->delete();

         return [ 
            'success' => true,
            'message' => 'Deleted your content'
        ];
    }




}
