<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\User;
use App\Models\UserAddress;
use App\Repositories\UserAddressRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class UserAddressController extends Controller
{
    private $userAddressRepo;
    private $user;
    public function __construct(UserAddressRepositoryInterface $userAddressRepo, Request $request)
    {
        $this->userAddressRepo = $userAddressRepo;
        $this->user = $request->user();
    }
    public function index()
    {
        $id = $this->user->id;
        try {
            $result['data'] = $this->userAddressRepo->getByUserId($id);
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
        $userId = $this->user->id;
        try {
            $result['data'] = $this->userAddressRepo->create($userId, $requst->all());
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
        $this->authorize('userAddressPolicy', $this->userAddressRepo->getById($id));
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
        $this->authorize('userAddressPolicy', $this->userAddressRepo->getById($id));
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
        $this->authorize('userAddressPolicy', $this->userAddressRepo->getById($id));
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
