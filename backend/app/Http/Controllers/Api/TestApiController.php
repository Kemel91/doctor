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
        $start = microtime(true);
        $bootstrap = round($start - LARAVEL_START, 3);
        $users = User::query()->paginate(50);
        $loadUsers = round(microtime(true) - $start, 3);

        return new JsonResponse([
            'bootstrap' => $bootstrap,
            'load_users' => $loadUsers,
            'users' => $users
            ]);
    }
}
