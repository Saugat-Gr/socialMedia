<?php

namespace App\Http\Controllers;

use App\Services\FollowService;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __construct(protected FollowService $followService) {}

    public function index(string $id)
    {
        return $this->followService->getFollowsFrom($id);
    }
}
