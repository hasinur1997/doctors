<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Doctor;

use App\Education;

use App\Specialty;

use App\Hospital;

use App\Visit;

use App\Location;

use Storage;


class DoctorsController extends Controller
{
    



    /**
     * Doctor index page
     * 
     * @return mixed
     */
    
    public function index()
    {
        $doctors = Doctor::orderBy('created_at', 'asc')->paginate(20);

        return view('admin.doctor_list', compact('doctors'));
    }


    /**
     * Get the doctor add form
     *
     * @return  mixed
     */
    
    public function create()
    {
        $educations = Education::all();

        $specialties = Specialty::all();

        $hospitals = Hospital::all();

        $locations = Location::all();

    	return view('admin.create', compact('educations', 'specialties', 'hospitals', 'locations'));
    }



   
    
    /**
     * Store all the form data 
     * @param  Request $request 
     * @return mixed
     */
    public function store(Request $request)
    {

    	$validators = $this->validate($request, [

    		'name' => 'required',

    		'address' => 'required',

    		'phone_number' => 'required',

            'hospital' => 'required',

            'education' => 'required',

            'specialty' => 'required',

            'image' => 'mimes:jpg,jpeg,png',

           'visitting_card' => 'required|mimes:jpg,jpeg,png',

           'location' => 'required'

    	]);


        $phone_number = implode(',', $request->phone_number);

        $data = [ 

            'name' => $request->name,

            'address' => $request->address,

            'phone_number' => $phone_number,

            'location_id' => $request->location,

            'visitting_card' => $request->file('visitting_card')->store('visitting_cards')

            ];

            if($request->hasFile('image')){

                $data = array_merge($data, ['image' => $request->file('image')->store('images')]);
            }

    	$doctor =  Doctor::create($data);

        

        $doctor->hospital()->attach($request->hospital);

        $doctor->education()->attach($request->education);


        $doctor->specialties()->attach($request->specialty);

    	return [ 
            'success' => true,

            'message' => 'Your record has been added',
        ];
    	

    }


    /**
     * 
     */

    public function edit($id)
    {
        $doctor = Doctor::find($id);

        $hospitals = Hospital::all();

        $specilities = Specialty::all();

        $educations = Education::all();

        $phone_number = explode(',', $doctor->phone_number);

    	return view('admin.edit', compact('doctor', 'phone_number', 'hospitals', 'specilities', 'educations'));
    }


    /**
     * 
     */
    

    public function update($id, Request $request)
    {
    	$doctor = Doctor::find($id);

    	$this->validate($request, [ 

    		'name' => 'required',

    		'address' => 'required',

    		'image' => 'mimes:jpg,jpeg,png',

            'visitting_card' => 'mimes:jpg,jpeg,png',

            'hospital' => 'required',

            'education' => 'required',

            'specialty' => 'required',
    	]);

        $phone_number = implode(',', $request->phone_number);

        $data = ([ 

            'name' => $request->name,

            'address' => $request->address,

            'phone_number' => $phone_number,

            'image' => $request->image,
        ]);

        if($request->hasFile('visitting_card')){

            $data = array_merge($data, ['visitting_card' => $request->file('visitting_card')->store('visitting_cards')]);

            Storage::delete($doctor->visitting_card);
        }


        if($request->hasFile('image')){

            $data = array_merge($data, ['image' => $request->file('image')->store('images')]);

            Storage::delete($doctor->image);
        }


        $doctor->update($data);

        $doctor->education()->sync($request->education);

        $doctor->specialties()->sync($request->specialty);

        $doctor->hospital()->sync($request->hospital);

    	
    	return [ 
            'success' => true,

            'message' => 'Your data has been updated'
        ];
    }



    /**
     *  Delete Doctor Record
     */
    
    public function destroy($id)
    {
        $doctor = Doctor::find($id);

        

        if(!empty($doctor->image)){

           Storage::delete($doctor->image);

        }

        Storage::delete($doctor->visitting_card);



        $doctor->delete();


        $doctor->education()->detach();

        $doctor->specialties()->detach();

        $doctor->hospital()->detach();


        return  [ 
            'success' => true,
            'message' => 'Your record has been deleted'
        ];
    }


    public function download($id)
    {
        $doctor = Doctor::find($id);

        $filePath = public_path('uploads/'.$doctor->visitting_card);

        return response()->download($filePath);


    }





}
