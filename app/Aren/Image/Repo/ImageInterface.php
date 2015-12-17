<?php
namespace App\Aren\Image\Repo;

interface ImageInterface
{
    public function getAll();
    public function find($id);
    public function findByPage($page_id);
    public function create(array $data);
    public function update(array $data);
    public function delete($id);
}
