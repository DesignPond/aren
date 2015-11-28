<?php
namespace App\Aren\Prestation\Repo;

use App\Aren\Prestation\Repo\PrestationInterface;
use App\Aren\Prestation\Entities\Prestation as M;

class PrestationEloquent implements PrestationInterface
{
    protected $prestation;

    public function __construct(M $prestation)
    {
        $this->prestation = $prestation;
    }

    public function getAll(){

        return $this->prestation->all();
    }

    public function find($id){

        return $this->prestation->findOrFail($id);
    }

    public function create(array $data){

        $prestation = $this->prestation->create(array(
            'titre_id'       => $data['titre_id'],
            'prestataire_id' => $data['prestataire_id'],
            'table_id'       => $data['table_id'],
            'places'         => (isset($data['places']) ? $data['places'] : null),
            'option_id'      => (isset($data['option_id']) && !empty($data['option_id']) ? $data['option_id'] : null),
            'prix'           => (isset($data['prix']) ? $data['prix'] : null),
            'remarque'       => (isset($data['remarque']) ? $data['remarque'] : null),
        ));

        if( ! $prestation )
        {
            return false;
        }

        return $prestation;

    }

    public function update(array $data){

        $prestation = $this->prestation->findOrFail($data['id']);

        if( ! $prestation )
        {
            return false;
        }

        $prestation->fill($data);
        $prestation->save();

        return $prestation;
    }

    public function delete($id){

        $prestation = $this->prestation->find($id);

        return $prestation->delete($id);
    }

}
