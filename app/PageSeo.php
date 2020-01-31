<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PageSeo extends Authenticatable
{
     use Notifiable;
	 protected $table = 'seopages';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'meta_title','meta_description','focus_keywords',
    ];
	
	public $timestamps = false;

   
}
