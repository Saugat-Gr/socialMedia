<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct(protected CommentService $commentService) {}

    public function index()
    {
        return Comment::all();
    }

    public function store(CommentRequest $request)
    {

        $validated = $request->validated();
        $content = $validated['content'];
        $postId = "01995dc1-a00e-7044-ad35-501fb73ef864";

        return $this->commentService->createComment($content, $postId);
    }

    public function update(CommentRequest $request, string $id)
    {

        $validated = $request->validated();
        $content = $validated['content'];

        $userId = "01995dbe-3135-72db-9025-44d704c2642a";
        $postId = "01995dc1-a00e-7044-ad35-501fb73ef864";

        return $this->commentService->updateComment(id: $id, postId: $postId, userId: $userId, content: $content);
    }

    public function delete(string $id)
    {

        return $this->commentService->deleteComment($id);
    }
}
