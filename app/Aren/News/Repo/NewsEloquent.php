<?php
namespace App\Cours\News\Repo;

use App\Aren\News\Repo\NewsInterface;
use App\Aren\News\Entities\News as M;

class NewsEloquent implements NewsInterface
{
    protected $news;

    public function __construct(M $news)
    {
        $this->news = $news;
    }

    public function getAll(){

        return $this->news->all();
    }

    public function find($id){

        return $this->news->findOrFail($id);
    }

    public function create(array $data){

        $news = $this->news->create(array(
            'titre' => $data['titre'],
            'text'  => $data['text'],
            'date'  => $data['date']
        ));

        if( ! $news )
        {
            return false;
        }

        return $news;

    }

    public function update(array $data){

        $news = $this->news->findOrFail($data['id']);

        if( ! $news )
        {
            return false;
        }

        $news->fill($data);
        $news->save();

        return $news;
    }

    public function delete($id){

        $news = $this->news->find($id);

        return $news->delete($id);
    }

}
