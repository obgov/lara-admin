<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Models\User;

class RegisterController extends Controller
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('register');
    }

    public function register(RegisterPostRequest $request): \Illuminate\Http\JsonResponse
    {
        $credentials = $request->validated();
        $createUser = $this->user->create($credentials);

        if ($createUser) {
            return response()->json(['success' => true], 200);
        }

        return response()->json(['errors' => [
            'base' => __('auth.register_failed')
        ]], 520);
    }
}
