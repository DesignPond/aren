<?php namespace App\Aren\User\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model{

    /**
     * Set timestamps off
     */
    public $timestamps = false;

    /**
     * Get users with a certain role
     */
    public function users()
    {
        return $this->belongsToMany('\App\Aren\User\Entities\User', 'users_roles');
    }
}