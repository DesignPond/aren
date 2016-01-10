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

        return $this->image->orderBy('rang')->get();
    }

    public function find($id){

        return $this->image->with(['page'])->find($id);
    }

    public function findByPage($page_id)
    {
        return $this->image->where('page_id','=',$page_id)->get();
    }

    public function create(array $data){

        $image = $this->image->create(array(
            'page_id' => $data['page_id'],
            'image'   => (isset($data['image']) ? $data['image'] : null),
            'titre'   => (isset($data['titre']) ? $data['titre'] : null),
            'text'    => (isset($data['text']) ? $data['text'] : null),
            'rang'    => (isset($data['rang']) ? $data['rang'] : null),
            'style'   => $data['style'],
            'url'     => (isset($data['url']) ? $data['url'] : null)
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
