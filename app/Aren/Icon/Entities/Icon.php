<?php

namespace App\Aren\Icon\Entities;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    protected $table    = 'icons';
	protected $fillable = ['titre','image'];

    public $timestamps  = false;

}