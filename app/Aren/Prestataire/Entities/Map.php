<?php

namespace App\Aren\Prestataire\Entities;

use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    protected $table    = 'maps';
	protected $fillable = ['prestataire_id','latitude','longitude','lien'];

    public $timestamps  = false;

}