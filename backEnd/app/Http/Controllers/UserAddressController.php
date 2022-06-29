<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\User;
use App\Repositories\UserAddressRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    private $userAddressRepo;
    public function __construct(UserAddressRepositoryInterface $userAddressRepo)
    {
        $this->userAddressRepo = $userAddressRepo;
    }
    public function index()
    {
        try {
            $result['data'] = $this->userAddressRepo->getAll();
        } catch (Exception $e) {
            $result = [
                'status'    => 500,
                'message'   => $e->getMessage()
            ];
        }
        return response()->json($result);
    }
    public function store(UserAddressRequest $requst)
    {
        try {
            $result['data'] = $this->userAddressRepo->create($requst->all());
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
            $result['data'] = $this->userAddressRepo->getById($id);
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result);
    }
    public function update(UserAddressRequest $requst, $id)
    {
        try {
            $result['data'] = $this->userAddressRepo->update($id, $requst->all());
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'message' => $e->getMessage()
            ];
        }
        return response()->json($result);
    }
    public function destroy($id)
    {
        try {
            $result['data'] = $this->userAddressRepo->delete($id);
        } catch (Exception $e) {
            $result = [
                'status'    => 500,
                'message'   => $e->getMessage()
            ];
        }
        return response()->json($result);
    }
}
