<?php

namespace App\Aren\Image\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;

    protected $table    = 'images';
	protected $fillable = ['titre','page_id','text','image','style','url','rang'];

    public function page()
    {
        return $this->belongsTo('App\Aren\Page\Entities\Page');
    }


}