<?php

namespace App\Aren\Prestation\Entities;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $table    = 'tables';
	protected $fillable = ['titre'];

    public $timestamps  = false;

}