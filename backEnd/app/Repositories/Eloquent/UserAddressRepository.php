<?php

namespace App\Repositories\Eloquent;

use App\Models\UserAddress;
use App\Repositories\UserAddressRepositoryInterface;

class UserAddressRepository implements UserAddressRepositoryInterface
{
    public function getAll()
    {
        $result = UserAddress::all();
        return $result;
    }
    public function create(array $attributes)
    {
        $result = UserAddress::create([
            'user_id'   => $attributes['user_id'],
            'number'    => $attributes['number'],
            'address'   => $attributes['address']
        ]);
        return $result->fresh();
    }
    public function getById($id)
    {
        $result = UserAddress::findOrFail($id);
        return $result;
    }
    public function update($id, array $attributes)
    {
        $get = UserAddress::findOrFail($id);
        $result = $get->update([
            'user_id'   => $attributes['user_id'],
            'number'    => $attributes['number'],
            'address'   => $attributes['address']
        ]);
        return $result;
    }
    public function delete($id)
    {
        $get = UserAddress::findOrFail($id);
        $result = $get->delete();
        return $result;
    }
}
