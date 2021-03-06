<?php

namespace App\Repositories;

interface ProductRepositoryInterface
{
    public function getAll();
    public function create(array $attributes);
    public function getById($id);
    public function update($id, array $attributes);
    public function delete($id);
}
