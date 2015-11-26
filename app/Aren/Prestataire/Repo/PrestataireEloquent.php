<?php
namespace App\Cours\Prestataire\Repo;

use App\Aren\Prestataire\Repo\PrestataireInterface;
use App\Aren\Prestataire\Entities\Prestataire as M;

class PrestataireEloquent implements PrestataireInterface
{
    protected $prestataire;

    public function __construct(M $prestataire)
    {
        $this->prestataire = $prestataire;
    }

    public function getAll(){

        return $this->prestataire->all();
    }

    public function find($id){

        return $this->prestataire->findOrFail($id);
    }

    public function create(array $data){

        $prestataire = $this->prestataire->create(array(
            'titre' => $data['titre'],
            'text'  => $data['text'],
            'date'  => $data['date']
        ));

        if( ! $prestataire )
        {
            return false;
        }

        return $prestataire;

    }

    public function update(array $data){

        $prestataire = $this->prestataire->findOrFail($data['id']);

        if( ! $prestataire )
        {
            return false;
        }

        $prestataire->fill($data);
        $prestataire->save();

        return $prestataire;
    }

    public function delete($id){

        $prestataire = $this->prestataire->find($id);

        return $prestataire->delete($id);
    }

}
