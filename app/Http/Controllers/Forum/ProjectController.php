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
        $id = 10;
        $category = $this->forumCategoryRepository->getCategoryTitle($id);
        $posts = $this->forumPostRepository->getAllWithCategory($id);
        return view('forum.builders', compact('posts', 'category'));
    }

    public function loadPost()
    {

    }
}
