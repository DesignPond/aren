<?php

namespace App\Aren\Type\Entities;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table    = 'types';
	protected $fillable = ['titre','contenu','type'];

    public $timestamps  = false;

}