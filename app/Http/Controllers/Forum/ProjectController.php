<?php

namespace App\Http\Controllers\Forum;

use App\Repositories\ForumCategoryRepository;
use App\Repositories\ForumPostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    private $forumPostRepository;
    private $forumCategoryRepository;

    public function __construct()
    {
        $this->forumPostRepository = app (ForumPostRepository::class);
        $this->forumCategoryRepository = app (ForumCategoryRepository::class);
    }

    public function index($id)
    {

        $perpage = 10;
        $id = 10;

        $posts = $this->forumPostRepository->getAllWithCategoryPatinate($perpage, $id);
        return view('forum.builders', compact('posts'));
    }
}
