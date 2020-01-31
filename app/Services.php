<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Services extends Authenticatable
{
     use Notifiable;
	 protected $table = 'services';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','slug','short_description','description','image','status','showonhomepage','meta_title','meta_description','focus_keywords',
    ];
	
	
   
}
