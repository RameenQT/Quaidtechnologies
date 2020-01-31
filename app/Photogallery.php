<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Photogallery extends Authenticatable
{
    use Notifiable;
	protected $table = 'photogallery';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'photo', 'story', 'display','type',
    ];
	
	public $timestamps = false;
    
    
}
