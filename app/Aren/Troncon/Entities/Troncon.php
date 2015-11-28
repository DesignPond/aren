<?php

namespace App\Aren\Troncon\Entities;

use Illuminate\Database\Eloquent\Model;

class Troncon extends Model
{
    protected $table    = 'troncons';
	protected $fillable = ['kml','name','color'];

    public $timestamps  = false;

}