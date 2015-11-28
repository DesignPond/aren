<?php

namespace App\Aren\Troncon\Entities;

use Illuminate\Database\Eloquent\Model;

class Troncon extends Model
{
    protected $table    = 'troncons';
	protected $fillable = ['kml','name','color','type'];

    public $timestamps  = false;

    /*
     *  scopes
     * */

    public function scopeType($query, $type)
    {
        if ($type) $query->where('type', '=' ,$type);
    }

}