<?php

namespace App\Http\Controllers\Forum\Admin;

use App\Repositories\ForumPostRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class PostController extends BaseController
{
	private $forumPostRepository;

	/**
	 * construct new model for search in repository
	 *
	 * UserController constructor.
	 */
	public function __construct()
	{
		$this->forumPostRepository = app(ForumPostRepository::class);
	}

	/**
	 * search all post with country
	 *
	 * @param Request $request
	 * @param $category
	 * @param $published
	 * @return mixed
	 */
	public function index(Request $request)
	{
		($request->publish === "moderation" ) ? $published = false : $published = true;
		$category = $request->project;

		($request->country) ? $country = $request->country : $country = null;

		$users = $this->forumPostRepository->getPostsWithCountry($published, $category, $country);

		return $users;
	}

	/**
	 * search on country list who's into redis (language = rus)
	 *
	 * @param Request $request
	 * @return array
	 */
	public function searchCountry(Request $request)
	{
		$result = [];
		$searchWord = $request->params['search'];

		if ($searchWord) {
			$country = json_decode(Redis::get("ru"), true);

			foreach ($country as $key => $value) {
				if (mb_stripos($value, $searchWord) !== false) {
					$result[] = $value;
				}
			}
		}

		return $result;
	}
}