<?php
namespace App\Aren\Troncon\Repo;

use App\Aren\Troncon\Repo\TronconInterface;
use App\Aren\Troncon\Entities\Troncon as M;

class TronconEloquent implements TronconInterface
{
    protected $troncon;

    public function __construct(M $troncon)
    {
        $this->troncon = $troncon;
    }

    public function getAll($type){

        return $this->troncon->type($type)->get();
    }

    public function find($id){

        return $this->troncon->findOrFail($id);
    }

    public function create(array $data)
    {
        $color = null;

        if(isset($data['color']) && !empty($data['color']))
        {
            $worker = \App::make('App\Aren\Troncon\Worker\TronconWorkerInterface');
            $color = $worker->colorToKml($data['color']);
        }

        $troncon = $this->troncon->create(array(
            'kml'   => $data['kml'],
            'name'  => $data['name'],
            'color' => $color,
            'type'  => $data['type'],
        ));

        if( ! $troncon )
        {
            return false;
        }

        return $troncon;

    }

    public function update(array $data){

        $troncon = $this->troncon->findOrFail($data['id']);

        if( ! $troncon )
        {
            return false;
        }

        $troncon->fill($data);

        if(isset($data['color']) && !empty($data['color']))
        {
            $worker = \App::make('App\Aren\Troncon\Worker\TronconWorkerInterface');
            $troncon->color = $worker->colorToKml($data['color']);
        }

        $troncon->save();

        return $troncon;
    }

    public function delete($id){

        $troncon = $this->troncon->find($id);

        return $troncon->delete($id);
    }

}
