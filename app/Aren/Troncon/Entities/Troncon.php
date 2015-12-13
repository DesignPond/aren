<?php

namespace App\Aren\Troncon\Entities;

use Illuminate\Database\Eloquent\Model;

class Troncon extends Model
{
    protected $table    = 'troncons';
	protected $fillable = ['kml','name','color','type'];

    public $timestamps  = false;

    public function getColorHexAttribute()
    {
        $worker = \App::make('App\Aren\Troncon\Worker\TronconWorkerInterface');

        if($this->color != '')
        {
            return $worker->colorToRgb($this->color);
        }

        return '';
    }

    /*
     *  scopes
     * */
    public function scopeType($query, $type)
    {
        if ($type) $query->where('type', '=' ,$type);
    }
}