<?php
namespace App\Aren\Prestation\Repo;

use App\Aren\Prestation\Repo\OptionInterface;
use App\Aren\Prestation\Entities\Option as M;

class OptionEloquent implements OptionInterface
{
    protected $option;

    public function __construct(M $option)
    {
        $this->option = $option;
    }

    public function getAll(){

        return $this->option->all();
    }

    public function find($id){

        return $this->option->findOrFail($id);
    }

    public function create(array $data){

        $option = $this->option->create(array(
            'titre' => $data['titre'],
        ));

        if( ! $option )
        {
            return false;
        }

        return $option;

    }

    public function update(array $data){

        $option = $this->option->findOrFail($data['id']);

        if( ! $option )
        {
            return false;
        }

        $option->fill($data);
        $option->save();

        return $option;
    }

    public function delete($id){

        $option = $this->option->find($id);

        return $option->delete($id);
    }

}
