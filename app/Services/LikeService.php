<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Hash;

class LikeService
{

  public function createLike(string $postId, string $userId)
  {
    return Like::create([
      'post_id' => $postId,
      'user_id' => $userId,
    ]);
  }



  public function deleteLike(string $userId, string $likeId)
  {

    $like = Like::where('user_id', $userId)->where('id', $likeId)->first();

    if ($like == null) {
      return "No Like found";
    }

    $like->delete();
    return true;
  }
}
