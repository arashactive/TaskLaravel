<?php

namespace App\Http\Controllers\web\statics;

use App\Http\Controllers\Controller;
use App\Http\Requests\Audience\UserLoginRequest;
use App\Services\Audience\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{

    protected UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    public function login(): View
    {
        return view('web.sections.static.login');
    }

    public function attempt(UserLoginRequest $request): RedirectResponse
    {
        return $this->service->login($request);
    }

    public function logout(): RedirectResponse
    {
        return $this->service->logout();
    }
}
