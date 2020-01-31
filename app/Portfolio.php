<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Portfolio extends Authenticatable
{
     use Notifiable;
	 protected $table = 'portfolio';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type','slug','title','tagLine','category','compatibility','seller','size','languages','ageRating','copyright','price','description','shortDescription','description2','appStoreLine','playStoreLink','clientName','clientWords','clientVideo','slidrThumb','mianImage','desImage1','desImage2',
    ];
	
	
   public $timestamps = false;
}
