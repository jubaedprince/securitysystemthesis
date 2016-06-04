<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'description',
    ];

    public function getUrlAttribute($value)
    {
    	//makes a complete url by attaching the base uri.
    	
    	return url($value);
    }
}
