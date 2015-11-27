<?php
namespace App\Aren\Type\Repo;

use App\Aren\Type\Repo\TypeInterface;
use App\Aren\Type\Entities\Type as M;

class TypeEloquent implements TypeInterface
{
    protected $type;

    public function __construct(M $type)
    {
        $this->type = $type;
    }

    public function getAll(){

        return $this->type->all();
    }

    public function find($id){

        return $this->type->findOrFail($id);
    }

    public function create(array $data){

        $type = $this->type->create(array(
            'titre'   => $data['titre'],
            'content' => $data['content'],
            'type'    => $data['type']
        ));

        if( ! $type )
        {
            return false;
        }

        return $type;

    }

    public function update(array $data){

        $type = $this->type->findOrFail($data['id']);

        if( ! $type )
        {
            return false;
        }

        $type->fill($data);
        $type->save();

        return $type;
    }

    public function delete($id){

        $type = $this->type->find($id);

        return $type->delete($id);
    }

}
