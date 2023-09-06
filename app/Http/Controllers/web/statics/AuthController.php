<?php

namespace App\Http\Controllers\Web\Statics;

use App\Http\Controllers\Controller;
use App\Http\Requests\Audience\UserLoginRequest;
use App\Services\Audience\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class AuthController extends Controller
{
    /**
     * @var UserService
     */
    protected $service;

    /**
     * AuthController constructor.
     *
     * @param UserService $service
     */
    public function __construct(UserService $service)
    {
        $this->service = $service;
    }

    /**
     * Display the login form.
     *
     * @return View
     */
    public function login(): View
    {
        return view('web.sections.static.login');
    }

    /**
     * Attempt user login.
     *
     * @param UserLoginRequest $request
     * @return RedirectResponse
     */
    public function attempt(UserLoginRequest $request): RedirectResponse
    {
        return $this->service->login($request);
    }

    /**
     * Logout the user.
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        $this->service->logout();
        return redirect()->to(route('login'));
    }
}





