<?php
namespace App\Aren\Bloc\Repo;

use App\Aren\Bloc\Repo\BlocInterface;
use App\Aren\Bloc\Entities\Bloc as M;

class BlocEloquent implements BlocInterface
{
    protected $bloc;

    public function __construct(M $bloc)
    {
        $this->bloc = $bloc;
    }

    public function getAll(){

        return $this->bloc->orderBy('id','asc')->get();
    }

    public function find($id){

        return $this->bloc->findOrFail($id);
    }

    public function create(array $data){

        $bloc = $this->bloc->create(array(
            'titre'   => $data['titre'],
            'contenu' => $data['contenu'],
            'type'    => $data['type']
        ));

        if( ! $bloc )
        {
            return false;
        }

        return $bloc;

    }

    public function update(array $data){

        $bloc = $this->bloc->findOrFail($data['id']);

        if( ! $bloc )
        {
            return false;
        }

        $bloc->fill($data);
        $bloc->save();

        return $bloc;
    }

    public function delete($id){

        $bloc = $this->bloc->find($id);

        return $bloc->delete($id);
    }

}
