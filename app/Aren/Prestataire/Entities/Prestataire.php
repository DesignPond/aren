<?php

namespace App\Aren\Prestataire\Entities;

use Illuminate\Database\Eloquent\Model;

class Prestataire extends Model
{
    protected $table    = 'participants';
	protected $fillable = ['etablissement','tache','civilite','prenom','nom','npa','rue','ville','district','telephone','mobile','fax','email','web','noParticipant','actif','rang'];

    public $timestamps  = false;

    public function getBarnTitleAttribute()
    {
        if($this->etablissement != '')
        {
            return $this->etablissement;
        }

        return $this->civilite.' '.$this->prenom.' '.$this->nom;
    }

    public function getNameTitleAttribute()
    {
        if($this->etablissement == '')
        {
            return '<p><a href="'.url('participant/'.$this->id).'">'.$this->civilite.' '.$this->prenom.' '.$this->nom.'</a>';
        }

        return '';
    }

    public function getNameSimpleAttribute()
    {
        return $this->civilite.' '.$this->prenom.' '.$this->nom;
    }

    /*
     *  scopes
     * */

    public function scopeActifs($query, $actifs)
    {
        if ($actifs) $query->where('actif', '>' ,0);
    }

    public function scopeParticipants($query, $participant)
    {
        if ($participant) $query->where('noParticipant', '>' ,0);
    }

    public function types()
    {
        return $this->belongsToMany('App\Aren\Type\Entities\Type','prestataire_types','prestataire_id','type_id');
    }

    public function map()
    {
        return $this->hasOne('App\Aren\Prestataire\Entities\Map','prestataire_id');
    }

    public function remarques()
    {
        return $this->hasMany('App\Aren\Prestation\Entities\Remarque');
    }

    public function prestations()
    {
        return $this->hasMany('App\Aren\Prestation\Entities\Prestation');
    }

}