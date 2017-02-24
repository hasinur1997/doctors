<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Hospital extends Model
{	

	protected $fillable = [ 

		'hospital_name',

		'location', 
		
		'phone_number'

	];
	
	/**
	 * [phoneNumbers description]
	 * 
	 * @return void
	 * 
	 */
	public function numbers()
	{
		return $this->morphMany(Number::class, 'numberable');
	}



	/**
	 * 
	 * [visits description]
	 * 
	 * @return [type] [description]
	 * 
	 */
	
	public function visits()
	{
		return $this->hasMany(Visit::class);
	}




	/**
	 * [doctor description]
	 * 
	 * @return [type] [description]
	 * 
	 */
	public function doctor()
	{
		return $this->belongsToMany(Doctor::class)->withPivot('day', 'time');
	}

	
}
