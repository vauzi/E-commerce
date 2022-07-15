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
    public function getByUserId($id)
    {
        $result = UserAddress::where(['user_id' => $id])->get();
        return $result;
    }
    public function create($userID, array $attributes)
    {
        $result = UserAddress::create([
            'user_id'   => $userID,
            'number'    => $attributes['number'],
            'village'   => $attributes['village'],
            'district'  => $attributes['district'],
            'province'  => $attributes['province'],
            'postal_code'   => $attributes['postal_code'],
            'complate_address'  => $attributes['complate_address'],
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
            'village'   => $attributes['village'],
            'district'  => $attributes['district'],
            'province'  => $attributes['province'],
            'postal_code'   => $attributes['postal_code'],
            'complate_address'  => $attributes['complate_address'],
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
