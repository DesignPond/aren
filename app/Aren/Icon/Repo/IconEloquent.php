<?php
namespace App\Aren\Icon\Repo;

use App\Aren\Icon\Repo\IconInterface;
use App\Aren\Icon\Entities\Icon as M;

class IconEloquent implements IconInterface
{
    protected $icon;

    public function __construct(M $icon)
    {
        $this->icon = $icon;
    }

    public function getAll(){

        return $this->icon->orderBy('titre')->get();
    }

    public function find($id){

        return $this->icon->findOrFail($id);
    }

    public function findByTitre($titre)
    {
        return $this->icon->where('titre','=',$titre)->get();
    }

    public function create(array $data){

        $icon = $this->icon->create(array(
            'titre' => $data['titre'],
            'style' => $data['style'],
            'image' => $data['image']
        ));

        if( ! $icon )
        {
            return false;
        }

        return $icon;

    }

    public function update(array $data){

        $icon = $this->icon->findOrFail($data['id']);

        if( ! $icon )
        {
            return false;
        }

        $icon->fill($data);
        $icon->save();

        return $icon;
    }

    public function delete($id){

        $icon = $this->icon->find($id);

        return $icon->delete($id);
    }

}
