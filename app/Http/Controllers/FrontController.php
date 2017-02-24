<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Specialty;

use App\Education;

use App\Doctor;

use App\Hospital;

use App\Location;

class FrontController extends Controller
{
    //
    

    public function index()
    {
    	$specialties = Specialty::all();

        $locations = Location::all();

    	return view('front-page.index', compact('specialties', 'locations'));
    }


    public function search($id)
    {
        $doctors = Specialty::find($id)->doctors()->get();


    	return view('front-page.search', compact('doctors'));
    }


    public function doctor($id)
    {
        $doctor = Doctor::find($id);

    	return view('front-page.doctor', compact('doctor'));
    }


    public function download($id)
    {
        $doctor = Doctor::find($id);

        $file = public_path('uploads/'.$doctor->visitting_card);

        return response()->download($file);
    }
}
