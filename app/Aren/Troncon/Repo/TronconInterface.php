<?php
namespace App\Aren\Troncon\Repo;

interface TronconInterface
{
    public function getAll($type);
    public function find($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
}
