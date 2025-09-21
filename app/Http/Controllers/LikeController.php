<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Services\LikeService;
use Illuminate\Http\Request;

class LikeController extends Controller
{

    public function __construct(protected LikeService $likeService) {}


    public function index()
    {
        return Like::all();
    }

    public function store(Request $request)
    {

        $userId = "01996132-23c3-73fa-867a-3528e8e538a1";
        $postId = $request->post_id;

        return $this->likeService->createLike($postId, $userId);
    }

    public function delete(Request $request)
    {
        $userId = "01996132-23c3-73fa-867a-3528e8e538a1";
        $likeId = $request->id;

        return $this->likeService->deleteLike($userId, $likeId);
    }
}
