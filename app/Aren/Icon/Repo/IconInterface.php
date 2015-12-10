<?php
namespace App\Aren\Icon\Repo;

interface IconInterface
{
    public function getAll();
    public function find($id);
    public function findByTitre($titre);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
}
