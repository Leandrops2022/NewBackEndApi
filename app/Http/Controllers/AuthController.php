<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AuthServiceInterface;
use App\Contracts\Services\HandleErrorServiceInterface;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\ResetPasswordRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected AuthServiceInterface $authService, protected HandleErrorServiceInterface $handleErrorService) {}

    public function register(RegisterRequest $request)
    {
        $userData = $request->validated();

        try {
            $response = $this->authService->register($userData);

            return response()->json($response, 201);
        } catch (QueryException $e) {
            $message = $this->handleErrorService->handleError($e);

            return response()->json([
                'message' => 'This email has already been registered',
            ], 500);

        } catch (Exception $e) {
            $message = $this->handleErrorService->handleError($e);

            return response()->json($message, 500);
        }

    }

    public function accountActivation(Request $request)
    {
        $tokenNumber = $request->query('token');
        $message     = $this->authService->accountActivation($tokenNumber);

        return view('account-activation.activation-message')->with(['message' => $message['message']]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        try {
            $response = $this->authService->login($credentials);

            return response()->json($response, 200);
        } catch (Exception $e) {
            $message = $this->handleErrorService->handleError($e);

            return response()->json($message, 500);
        }

    }

    public function logout(Request $request)
    {
        $logoutResult = $this->authService->logout($request);

        $response = [
            true  => response()->json(['message' => 'Successfully logged out!'], 200),
            false => response()->json(['message' => 'Error logging you out, please try again'], 500),
        ];

        return $response[$logoutResult];
    }

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $email    = $request->validated();
        $response = $this->authService->forgotPassword($email);

        return $response;
    }

    public function invalidPasswordToken()
    {
        return view('reset-password.invalid-token');
    }

    public function resetPasswordView(Request $request)
    {
        return view('reset-password.index');
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $credentials = $request->validated();
        $response    = $this->authService->resetPassword($credentials);

        return $response;
    }
}
