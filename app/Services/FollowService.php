<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class FollowService
{

  public function getFollowsFrom(string $userId)
  {
    return Follow::where('from_id', $userId)->get();
  }

  public function createFollow(string $fromId,  string $toId)
  {
    return Follow::create([
      "from_id" => $fromId,
      "to_id" => $toId
    ]);
  }

  public function deleteFollow(string $fromId, string $toId)
  {

    $follow = Follow::where("from_id", $fromId)->where("to_id", $toId)->first();

    if ($follow == null) {
      return "No Follow";
    }

    $follow->delete();
    return true;
  }
}
