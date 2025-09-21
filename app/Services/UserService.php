<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserService
{

  public function login(string $email, string $password)
  {

    if (Auth::attempt([
      "email" => $email,
      "password" => $password,
    ])) {
      return true;
    }

    return false;
  }


  public function register(string $email, string $password)
  {

    $normalizedEmail = strtolower($email);

    $user = User::where('email', $normalizedEmail)->first();

    if ($user != null) {
      return false;
    }

    User::create([
      'name' => "Random Ass",
      'email' => $email,
      'password' => Hash::make($password)
    ]);

    return true;
  }
}
