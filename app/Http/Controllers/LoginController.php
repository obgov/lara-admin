<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Services\MainService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Events\UserAuthenticated;

class LoginController extends Controller
{
    public function authenticate(LoginPostRequest $request): \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            UserAuthenticated::dispatch(Auth::user());
            return response()->json(['success' => true], 200);
        }

        return response()->json(['errors' => [
            'base' => __('auth.failed')
        ]], 401);
    }

    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Session::flush();
        Auth::logout();
        return redirect()->route('index');
    }

    // for test purposes only
    public function test(MainService $service)
    {
        echo $service->testService();
    }
}
