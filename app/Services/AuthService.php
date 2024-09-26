<?php

namespace App\Services;

use App\Contracts\Services\AuthServiceInterface;
use App\Jobs\SendAccountConfirmationEmail;
use App\Models\ActivationToken;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class AuthService implements AuthServiceInterface
{
    public function register($data): array
    {
        DB::beginTransaction();
        $user  = User::create($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        if ($token) {
            SendAccountConfirmationEmail::dispatch($user);

            DB::commit();

            return [
                'message' => 'Account created Succesfully',
                'token'   => $token,
            ];
        } else {
            DB::rollBack();
            throw new Exception('Failed creating a new account');
        }
    }

    public function accountActivation($tokenNumber): array
    {
        DB::beginTransaction();
        $token = ActivationToken::where('token', $tokenNumber)->first();
        if ($token) {

            User::where('id', $token->user_id)->update([
                'email_verified_at' => now('America/Sao_Paulo'),
            ]);
            $token->delete();
            DB::commit();

            return [
                'message'  => 'Your account has been activated',
            ];
        } else {
            DB::rollBack();

            return [
                'message'  => 'This account has already been activated or this token is invalid',
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

        } else {
            throw new Exception('Invalid credentials');
        }

    }

    public function logout(Request $request): bool
    {
        $user = $request->user();

        if ($user && $user->currentAccessToken()) {
            $user->currentAccessToken()->delete();

            return true;
        }

        return false;
    }

    public function forgotPassword($email)
    {
        $status = Password::sendResetLink($email);

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => __($status)])
            : response()->json(['message' => __($status)], 500);
    }

    public function resetPassword($credentials)
    {
        $status = Password::reset($credentials, function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password),
            ])->save();
        });

        return $status === Password::PASSWORD_RESET
            ? response()->json(['message' => __($status)])
            : response()->json(['message' => __($status)], 500);
    }
}
