<?php

namespace App\Aren\Bloc\Entities;

use Illuminate\Database\Eloquent\Model;

class Bloc extends Model
{
    protected $table    = 'blocs';
	protected $fillable = ['titre','contenu','type'];

    public $timestamps  = false;

}