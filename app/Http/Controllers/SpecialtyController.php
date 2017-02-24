<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Specialty;

class SpecialtyController extends Controller
{
    //
    //
   	
      /**
       * 
       */
      

      public function index()
      {
         $specialties = Specialty::all();


         return view('admin.specialty.index', compact('specialties', 'doctors'));
      }

   	/**
   	 * 
   	 */
   	
   	public function create()
   	{
   		return view('admin.specialty.create');
   	}


   	/**
   	 * 
   	 */
   	
   	public function store(Request $request)
   	{
   		$this->validate($request, [

   			'name' => 'required'

   		]);


   		Specialty::create([ 

   			'name' => $request->name

   		]);

   		return back()

   			->with('flash_notification.message', 'Your data has been inserted')

   			->with('flash_notification.level', 'success');

   	}

      /**
       * 
       */
      
      public function edit($id)
      {
         $specialty = Specialty::find($id);

         return view('admin.specialty.edit', compact('specialty'));
      }


      /**
       * 
       */
      

      public function update(Request $request, $id)
      {
         $specialty = Specialty::find($id);

         $this->validate($request, [ 

            'name' => 'required' 
         ]);

         $specialty->name = $request->name;

         $specialty->save();

         return redirect()->route('specialties.index')

            ->with('flash_notification.message', 'Your data has been updated')

            ->with('flash_notification.level', 'success');
      }



      /**
       * 
       */
      
      public function destroy($id)
      {
         $specialty = Specialty::find($id);

         $specialty->delete();

         return back()

            ->with('flash_notification.message', 'Your data has been updated')

            ->with('flash_notification.level', 'success');

      }



}
