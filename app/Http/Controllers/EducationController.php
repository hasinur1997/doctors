<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Education;

class EducationController extends Controller
{


	/**
	 * 
	 */
	
	public function index()
	{	
	
		$edu_lists = Education::all();

		return view('admin.education.education_list', compact('edu_lists'));
	}
 	
 	/**
 	 * 
 	 */
 	

 	public function create()
 	{
 		return view('admin.education.create');
 	}

 	/**
 	 * 
 	 */
 	

 	public function store(Request $request)
 	{
 		$this->validate($request, [

 			'name' => 'required',

 		]);


 		Education::create([ 

 			'title' => $request->name
 		]);

 		return [ 
 			'success' => true,

 			'message' => 'Your data has been inserted'
 		];

 	}


 	/**
 	 * 
 	 */
 	

 	public function edit($id)
 	{
 		$education = Education::find($id);

 		return view('admin.education.edit', compact('education'));
 	}


 	/**
 	 * 
 	 */
 	

 	public function update(Request $request, $id)
 	{
 		$education = Education::find($id);

 		$this->validate($request, [ 

 			'name' => 'required'
 		]);


 		$education->title = $request->name;

 		$education->save();

 		return redirect()->route('education.index')

 			->with('flash_notification.message', 'Your content has been updated')

 			->with('flash_notification.level', 'success');
 	}



 	/**
 	 * 
 	 */
 	
 	public function destroy(Education $education)
 	{

 		$education->delete();

 		return [ 

 			'success' => true,

 			'message' => 'Your data has been deleted'
 		];
 	}


}
