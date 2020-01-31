<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Blog extends Authenticatable
{
     use Notifiable;
	 protected $table = 'blog';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','category','slug','short_description','description','image','status','meta_title','meta_description','focus_keywords',
    ];
	
	//public $timestamps = false;
	public function categoryName()
    {
        return $this->belongsTo('App\Categories','category');
    }
   
}
