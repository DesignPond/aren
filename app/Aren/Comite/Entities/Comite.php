<?php

namespace App\Aren\Comite\Entities;

use Illuminate\Database\Eloquent\Model;

class Comite extends Model
{
    protected $table    = 'comites';
	protected $fillable = ['titre','texte','date'];
    protected $dates    = ['date'];

    public $timestamps  = false;

}