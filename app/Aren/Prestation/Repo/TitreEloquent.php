<?php
namespace App\Aren\Prestation\Repo;

use App\Aren\Prestation\Repo\TitreInterface;
use App\Aren\Prestation\Entities\Titre as M;

class TitreEloquent implements TitreInterface
{
    protected $titre;

    public function __construct(M $titre)
    {
        $this->titre = $titre;
    }

    public function getAll(){

        return $this->titre->all();
    }

    public function find($id){

        return $this->titre->findOrFail($id);
    }

    public function create(array $data){

        $titre = $this->titre->create(array(
            'titre' => $data['titre'],
        ));

        if( ! $titre )
        {
            return false;
        }

        return $titre;

    }

    public function update(array $data){

        $titre = $this->titre->findOrFail($data['id']);

        if( ! $titre )
        {
            return false;
        }

        $titre->fill($data);
        $titre->save();

        return $titre;
    }

    public function delete($id){

        $titre = $this->titre->find($id);

        return $titre->delete($id);
    }

}
