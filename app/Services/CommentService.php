<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CommentService
{

  public function createComment(string $content, string $postId)
  {

    $comment = Comment::create([
      "content" => $content,
      "post_id" => $postId,
      "user_id" => "01995dbe-3135-72db-9025-44d704c2642a",
    ]);

    return $comment;
  }

  public function updateComment(string $id, string $postId, string $userId, string $content)
  {
    $comment = Comment::where('user_id', $userId)->where('id', $id)->where('post_id', $postId)->first();

    if ($comment == null) {
      return null;
    }

    $comment->content = $content;
    $comment->update();

    return $comment;
  }

  public function deleteComment(string $id)
  {

    $comment = Comment::where('id', $id)->first();

    if ($comment == null) {
      return "No comment found";
    }

    $comment->delete();

    return true;
  }
}
