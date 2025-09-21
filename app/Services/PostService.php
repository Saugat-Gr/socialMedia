<?php

namespace App\Services;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PostService
{

  public function createPost(string $userId, string $caption)
  {

    $post = Post::create([
      "caption" => $caption,
      "user_id" => $userId,
    ]);

    return $post;
  }

  public function updatePost(string $userId, string $id, string $caption)
  {
    $post = Post::where('user_id', $userId)->where('id', $id)->first();

    if ($post == null) {
      return null;
    }

    $post->caption = $caption;
    $post->update();
    return $post;
  }

  public function deletePost(string $user_id, string $id)
  {

    $post = Post::where('user_id', $user_id)->where('id', $id)->first();

    if ($post == null) {
      return "No Post found";
    }

    $post->delete();


    return true;
  }
}
