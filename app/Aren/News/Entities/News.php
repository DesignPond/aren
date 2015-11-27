<?php

namespace App\Aren\News\Entities;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table    = 'news';
	protected $fillable = ['titre','texte','dateNews'];
    protected $dates    = ['dateNews'];

    public $timestamps  = false;

}