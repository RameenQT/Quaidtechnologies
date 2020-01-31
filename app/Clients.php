<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Clients extends Authenticatable
{
     use Notifiable;
	 protected $table = 'clients';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','url','image','status',
    ];
	
	public $timestamps = false;
   
}
