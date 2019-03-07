<?php

namespace App\Http\Controllers\Forum;

use App\Repositories\ForumCategoryRepository;
use App\Repositories\ForumPostRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;


class ProjectController extends Controller
{
    private $forumPostRepository;
    private $forumCategoryRepository;

    public function __construct()
    {
        $this->forumPostRepository = app (ForumPostRepository::class);
        $this->forumCategoryRepository = app (ForumCategoryRepository::class);
    }

	/**
	 * Page with create new post
	 *
	 * @param $id
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index($id)
    {
        $category = $this->forumCategoryRepository->getCategoryTitle($id);
        return view('forum.builders', compact( 'category'));
    }


	/**
	 * Load post with selected language, country
	 *
	 * @param Request $request
	 * @param $id
	 * @return mixed
	 */
    public function loadPost(Request $request, $id)
    {
    	if ( $request->country ) {
			$county = array_search($request->country, json_decode(Redis::get($request->language), true ));
		}
    	else
		{
			$county = null;
		}

        $request->personsLength ? $start = $request->personsLength : $start = 1;
        $posts = $this->forumPostRepository->getAllWithCategory( $id, $start, $county );

       return $posts;
    }
}
