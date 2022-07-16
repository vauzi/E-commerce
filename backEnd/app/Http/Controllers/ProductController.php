<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Repositories\ProductRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productRepo;
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }
    public function index()
    {
        try {
            $result['data'] = $this->productRepo->getAll();
        } catch (Exception $e) {
            $result = [
                'status'    => 500,
                'message'   => $e->getMessage()
            ];
        }
        return response()->json($result);
    }
    public function store(ProductRequest $request)
    {
        try {
            $result['data'] = $this->productRepo->create($request->all());
        } catch (Exception $e) {
            $result = [
                'status'    => 500,
                'message'   => $e->getMessage()
            ];
        }
    }
}
