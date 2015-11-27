<?php

namespace App\Aren\Prestation\Entities;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $table    = 'options';
	protected $fillable = ['titre'];

    public $timestamps  = false;

}