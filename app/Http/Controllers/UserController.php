<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct(protected UserService $userService) {}

    public function login(Request $request)
    {

        $validated = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if (!$this->userService->login(email: $validated['email'], password: $validated['password'])) {
            return response()->json(['error' => "No Account Found, or wrong email or password"], status: 401);
        }

        $request->session()->regenerate();

        return response('');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if (!$this->userService->register(email: $validated['email'], password: $validated['password'])) {
            return response()->json(['error' => "Account Exists Already"]);
        }

        $user = \App\Models\User::where('email', $validated['email'])->first();
        Auth::login($user);

        return response()->json(['success' => true, 'user' => $user], 201);
    }

    public function logout()
    {
        Auth::logout();
    }
}
