<?php

namespace App\Http\Controllers\Api\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginStoreRequest;
use App\Interfaces\AuthRepositoryInterface;

class AuthController extends Controller
{
       private AuthRepositoryInterface $authRepository;

    public function __construct(AuthRepositoryInterface $authRepository)
    {
        $this->authRepository = $authRepository;
    }

    public function login(LoginStoreRequest $request)
    {
        $request = $request->validated();

        return $this->authRepository->login($request);
    }

    public function logout(){
        return $this->authRepository->logout();
    }
}
