<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Team extends Authenticatable
{
     use Notifiable;
	 protected $table = 'team';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category','title','designation','image','status','description',
    ];
	
	
   
}
