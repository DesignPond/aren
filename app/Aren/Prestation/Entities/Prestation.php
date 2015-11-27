<?php

namespace App\Aren\Prestation\Entities;

use Illuminate\Database\Eloquent\Model;

class Prestation extends Model
{
    protected $table    = 'prestations';
	protected $fillable = ['titre_id','places','prestataire_id','table_id','option_id','prix','remarque'];

    public $timestamps  = false;

    public function titre()
    {
        return $this->belongsTo('App\Aren\Prestation\Entities\Titre');
    }

    public function option()
    {
        return $this->belongsTo('App\Aren\Prestation\Entities\Option');
    }

    public function table()
    {
        return $this->belongsTo('App\Aren\Prestation\Entities\Table');
    }

    public function prestataire()
    {
        return $this->belongsTo('App\Aren\Prestataire\Entities\Prestataire','prestataire_id');
    }

}