<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TestApiController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::query()->paginate(50);

        return new JsonResponse($users);
    }
}
