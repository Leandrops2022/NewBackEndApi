<?php

namespace App\Contracts\Services;

use Illuminate\Http\Request;

interface AuthServiceInterface
{
    public function register($data): array;

    public function accountActivation($tokenNumber): array;

    public function login($credentials): array;

    public function logout(Request $request): bool;

    public function forgotPassword(string $email);

    public function resetPassword($credentials);
}
