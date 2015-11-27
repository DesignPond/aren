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

        return $this->prestation->orderBy('datePrestation','DESC')->get();
    }

    public function find($id){

        return $this->prestation->findOrFail($id);
    }

    public function create(array $data){

        $prestation = $this->prestation->create(array(
            'titre' => $data['titre'],
            'text'  => $data['text'],
            'date'  => $data['date']
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
