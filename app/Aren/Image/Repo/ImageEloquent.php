<?php
namespace App\Aren\Image\Repo;

use App\Aren\Image\Repo\ImageInterface;
use App\Aren\Image\Entities\Image as M;

class ImageEloquent implements ImageInterface
{
    protected $image;

    public function __construct(M $image)
    {
        $this->image = $image;
    }

    public function getAll(){

        return $this->image->orderBy('titre')->get();
    }

    public function find($id){

        return $this->image->findOrFail($id);
    }

    public function findByPage($page_id)
    {
        return $this->image->where('page_id','=',$page_id)->get();
    }

    public function create(array $data){

        $image = $this->image->create(array(
            'page_id' => $data['page_id'],
            'image'   => $data['image']
        ));

        if( ! $image )
        {
            return false;
        }

        return $image;

    }

    public function update(array $data){

        $image = $this->image->findOrFail($data['id']);

        if( ! $image )
        {
            return false;
        }

        $image->fill($data);
        $image->save();

        return $image;
    }

    public function delete($id){

        $image = $this->image->find($id);

        return $image->delete($id);
    }

}
