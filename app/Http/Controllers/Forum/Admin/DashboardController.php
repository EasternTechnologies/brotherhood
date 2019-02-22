<?php

namespace App\Http\Controllers\Forum\Admin;

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
    public function index(ForumCategoryRepository $forumCategoryRepository)
    {
        $category = $forumCategoryRepository->getForComboBox();

        return view('forum.admin.category.index', [
            'category'  =>  $category
        ]);

    }
}
