<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductCategoryController extends Controller
{
    public function index()
    {
        try {
            $result['dataa'] = ProductCategory::all();
        } catch (Exception $e) {
            $result = [
                'status'    => 500,
                'message'   => $e->getMessage()
            ];
        }
        return response()->json($result);
    }
    public function store(request $request)
    {
        $validation = Validator::make($request->all(), [
            'category'  => 'required', 'max:225'
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        try {
            $result['data'] = ProductCategory::create($request->all())->fresh();
        } catch (Exception $e) {
            $result = [
                'status'    => 500,
                'message'   => $e->getMessage()
            ];
        }
        return response()->json($result);
    }
    public function show($id)
    {
        try {
            $result['data'] = ProductCategory::findOrFail($id);
        } catch (Exception $e) {
            $result = [
                'status'    => 500,
                'message'   => $e->getMessage()
            ];
        }
        return response()->json($result);
    }
    public function update($id, request $request)
    {
        $validation = Validator::make($request->all(), [
            'category'  => 'required', 'max:225'
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        try {
            $category = ProductCategory::findOrFail($id);
            $result['data'] = $category->update($request->all());
        } catch (Exception $e) {
            $result = [
                'status'    => 500,
                'message'   => $e->getMessage()
            ];
        }
        return response()->json($result);
    }
    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);
        try {
            $result['data'] = $category->delete();
        } catch (Exception $e) {
            $result = [
                'status'    => 500,
                'message'   => $e->getMessage()
            ];
        }
    }
}
