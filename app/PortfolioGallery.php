<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class PortfolioGallery extends Authenticatable
{
    use Notifiable;
	protected $table = 'portfoliogallery';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'portfolioId', 'image',
    ];
	
	public $timestamps = false;
    
    
}
