<?php
namespace App\Aren\Comite\Repo;

use App\Aren\Comite\Repo\ComiteInterface;
use App\Aren\Comite\Entities\Comite as M;

class ComiteEloquent implements ComiteInterface
{
    protected $comite;

    public function __construct(M $comite)
    {
        $this->comite = $comite;
    }

    public function getAll(){

        return $this->comite->all();
    }

    public function find($id){

        return $this->comite->findOrFail($id);
    }

    public function create(array $data){

        $comite = $this->comite->create(array(
            'titre' => $data['titre'],
            'text'  => $data['text'],
            'date'  => $data['date']
        ));

        if( ! $comite )
        {
            return false;
        }

        return $comite;

    }

    public function update(array $data){

        $comite = $this->comite->findOrFail($data['id']);

        if( ! $comite )
        {
            return false;
        }

        $comite->fill($data);
        $comite->save();

        return $comite;
    }

    public function delete($id){

        $comite = $this->comite->find($id);

        return $comite->delete($id);
    }

}
