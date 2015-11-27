<?php
namespace App\Aren\Prestation\Repo;

use App\Aren\Prestation\Repo\RemarqueInterface;
use App\Aren\Prestation\Entities\Remarque as M;

class RemarqueEloquent implements RemarqueInterface
{
    protected $remarque;

    public function __construct(M $remarque)
    {
        $this->remarque = $remarque;
    }

    public function getAll(){

        return $this->remarque->all();
    }

    public function find($id){

        return $this->remarque->findOrFail($id);
    }

    public function create(array $data){

        $remarque = $this->remarque->create(array(
            'texte'          => $data['texte'],
            'prestataire_id' => $data['prestataire_id']
        ));

        if( ! $remarque )
        {
            return false;
        }

        return $remarque;

    }

    public function update(array $data){

        $remarque = $this->remarque->findOrFail($data['id']);

        if( ! $remarque )
        {
            return false;
        }

        $remarque->fill($data);
        $remarque->save();

        return $remarque;
    }

    public function delete($id){

        $remarque = $this->remarque->find($id);

        return $remarque->delete($id);
    }

}
