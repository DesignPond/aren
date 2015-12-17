<?php

namespace App\Aren\Image\Entities;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table    = 'images';
	protected $fillable = ['page_id','image'];

    public $timestamps  = false;

}