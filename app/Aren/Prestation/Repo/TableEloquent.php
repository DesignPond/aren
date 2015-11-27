<?php
namespace App\Aren\Prestation\Repo;

use App\Aren\Prestation\Repo\TableInterface;
use App\Aren\Prestation\Entities\Table as M;

class TableEloquent implements TableInterface
{
    protected $table;

    public function __construct(M $table)
    {
        $this->table = $table;
    }

    public function getAll(){

        return $this->table->all();
    }

    public function find($id){

        return $this->table->findOrFail($id);
    }

    public function create(array $data){

        $table = $this->table->create(array(
            'titre' => $data['titre'],
        ));

        if( ! $table )
        {
            return false;
        }

        return $table;

    }

    public function update(array $data){

        $table = $this->table->findOrFail($data['id']);

        if( ! $table )
        {
            return false;
        }

        $table->fill($data);
        $table->save();

        return $table;
    }

    public function delete($id){

        $table = $this->table->find($id);

        return $table->delete($id);
    }

}
