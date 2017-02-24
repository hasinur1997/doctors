<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
	 protected $fillable = ['title'];


	public function doctors()
	{
	 	return $this->belongsToMany(Doctor::class);
	}
}
