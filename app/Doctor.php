<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'name', 

        'address', 

        'image', 

        'visitting_card',

        'phone_number',

        'location_id'
    ];

    /**
     * [specialties description]
     * 
     * @return [type] [description]
     * 
     */
    
    public function specialties()
    {
    	return $this->belongsToMany(Specialty::class);
    }

    /**
     * [education description]
     * 
     * @return [type] [description]
     */
    

    public function education()
    {
    	return $this->belongsToMany(Education::class);
    }


    /**
     * visits description
     * 
     * @return relationship
     * 
     */
    
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }

    /**
     * [hospital description]
     * 
     * @return [type] [description]
     * 
     */
    
    public function hospital()
    {
        return $this->belongsToMany(Hospital::class);
    }



}
