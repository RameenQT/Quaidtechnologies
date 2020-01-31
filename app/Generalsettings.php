<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Generalsettings extends Authenticatable
{
     use Notifiable;
	 protected $table = 'generalsettings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email','phone','facebook','twitter','linkdin','google','meta_title','meta_description','focus_keywords','linkedin',
    ];
	
	public $timestamps = false;
	
   
}
