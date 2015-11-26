<?php

namespace App\Aren\News\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table    = 'blocs';
	protected $fillable = ['titre','texte','date'];
    protected $dates    = ['date'];

    public $timestamps  = false;

}