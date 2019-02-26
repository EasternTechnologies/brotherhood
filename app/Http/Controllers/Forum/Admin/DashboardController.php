<?php

namespace App\Http\Controllers\Forum\Admin;

use App\Repositories\ForumPostRepository;
use Illuminate\Http\Request;
use App\Repositories\ForumCategoryRepository;

class DashboardController extends BaseController
{

    /**
     * Display a listing of the resource.
     *
     * @param ForumCategoryRepository $forumCategoryRepository
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ForumCategoryRepository $forumCategoryRepository, ForumPostRepository $forumPostRepository)
    {

        $published = $forumPostRepository->getAllPublishedPost();

        $category = $forumCategoryRepository->getForComboBox();

        $post = $forumPostRepository->getAllWithPaginate(10);


        return view('forum.admin.dashboard.index', compact('category', 'post'));

    }
}
