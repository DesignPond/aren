<?php

namespace App\Aren\Prestation\Entities;

use Illuminate\Database\Eloquent\Model;

class Remarque extends Model
{
    protected $table    = 'remarques';
	protected $fillable = ['texte','prestataire_id'];

    public $timestamps  = false;
    
}