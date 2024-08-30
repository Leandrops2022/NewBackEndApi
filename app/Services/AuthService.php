<?php

namespace App\Services;

use App\Contracts\Services\AuthServiceInterface;
use App\Jobs\SendAccountConfirmationEmail;
use App\Models\ActivationToken;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthService implements AuthServiceInterface{
    public function register($data): array
    {
        DB::beginTransaction();
        $user = User::create($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        SendAccountConfirmationEmail::dispatch($user);

        if ($token) {
            DB::commit();
            return [
                'message' => 'Account created Succesfully',
                'token'   => $token
            ];
        }else {
            DB::rollBack();
            throw new Exception('Failed creating a new account');
        }
    }

    public function accountActivation($tokenNumber):array
    {
        DB::beginTransaction();
        $token = ActivationToken::where("token", $tokenNumber)->first();
        if ($token) {

            User::where('id', $token->user_id)->update([
                "email_verified_at" => now('America/Sao_Paulo')
            ]);
            $token->delete();
            DB::commit();
            return [
                'message'  =>  'Your account has been activated'
            ];
        }else {
            DB::rollBack();
            return [
                'message'  =>  'This account has already been activated or this token is invalid'
            ];
        }

    }

    public function login($credentials): array
    {
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user) {
                $token = $user->createToken('auth_token')->plainTextToken;

                return [
                    'message' => 'Login successful',
                    'token'   => $token,
                ];
            }

        }else{
            throw new Exception('Invalid credentials');
        }

    }

    public function logout(): bool
    {
        return true;
    }
}
