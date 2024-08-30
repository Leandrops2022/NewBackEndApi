<?php

namespace App\Http\Controllers;

use App\Contracts\Services\AuthServiceInterface;
use App\Contracts\Services\HandleErrorServiceInterface;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(protected AuthServiceInterface $authService, protected HandleErrorServiceInterface $handleErrorService)
    {
    }

    public function register(RegisterRequest $request)
    {
        $userData = $request->validated();

        try {
            $response = $this->authService->register($userData);

            return response()->json($response,201);
        } catch (Exception $e) {
            $message = $this->handleErrorService->handleError($e);
            return response()->json($message,500);
        }

    }

    public function accountActivation(Request $request)
    {
        $tokenNumber = $request->query('token');
        $message = $this->authService->accountActivation($tokenNumber);
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
            return response()->json($message,500);
        }

    }

    public function logout()
    {

    }
}
