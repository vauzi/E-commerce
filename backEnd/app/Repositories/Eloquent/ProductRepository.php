<?php

namespace App\Repositories\Eloquent;

use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll()
    {
        $result = Product::orderBy('time', 'DESC')->get();
        return $result;
    }
    public function create(array $attributes)
    {
        $result = Product::create($attributes);
        return $result->fresh();
    }
    public function getById($id)
    {
        $result = Product::findOrFail($id);
        return $result;
    }
    public function update($id, array $attributes)
    {
        $put = Product::findOrFail($id);
        $result = $put->update($attributes);
        return $result;
    }
    public function delete($id)
    {
        $show = Product::findOrfail($id);
        $result = $show->delete();
        return $result;
    }
}
