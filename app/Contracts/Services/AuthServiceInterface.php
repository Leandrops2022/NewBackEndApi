<?php

namespace App\Contracts\Services;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\JsonResponse;

interface AuthServiceInterface
{
    public function register($data): array;
    public function accountActivation($tokenNumber): array;
    public function login($credentials): array;
    // public function logout(): bool;
}
