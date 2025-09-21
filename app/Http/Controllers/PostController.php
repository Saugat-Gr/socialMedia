<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PostController extends Controller
{

    public function __construct(protected PostService $postService) {}

    public function index()
    {
        return Post::all();
    }


    public function store(PostRequest $request)
    {
        $validated = $request->validated();

        $caption = $validated['caption'];

        return  $this->postService->createPost(userId: FacadesAuth::id(), caption: $caption);
    }

    public function updatePost(PostRequest $request, string $id)
    {

        $validated = $request->validated();
        $caption = $validated['caption'];

        $post = $this->postService->updatePost(userId: FacadesAuth::id(), id: $id, caption: $caption);

        if ($post == null) {
            return response()->json([
                "error" => "Post Not Found",

            ], status: 404);
        }
        return $post;
    }

    public function deletePost(Request $request)
    {

        $id = $request->id;

        return $this->postService->deletePost(FacadesAuth::id(), $id);
    }
}
