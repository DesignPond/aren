<?php

namespace App\Aren\Prestataire\Entities;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    protected $table    = 'blocs';
	protected $fillable = ['titre','texte','date'];
    protected $dates    = ['date'];

    public $timestamps  = false;

}