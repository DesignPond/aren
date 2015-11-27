<?php

namespace App\Aren\Prestation\Entities;

use Illuminate\Database\Eloquent\Model;

class Titre extends Model
{
    protected $table    = 'titres';
	protected $fillable = ['titre','prestataire_id'];

    public $timestamps  = false;


}