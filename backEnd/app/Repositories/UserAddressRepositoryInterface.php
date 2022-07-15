<?php

namespace App\Repositories;

interface UserAddressRepositoryInterface
{
    public function getAll();
    public function getByUserId($id);
    public function create($userID, array $attributes);
    public function getById($id);
    public function update($id, array $attributes);
    public function delete($id);
}
