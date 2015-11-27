<?php
namespace App\Aren\Type\Repo;

interface TypeInterface
{
    public function getAll();
    public function find($id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
}
