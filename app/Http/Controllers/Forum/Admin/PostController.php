<?php

namespace App\Http\Controllers\Forum\Admin;

use App\Repositories\ForumPostRepository;
use Illuminate\Http\Request;


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
	 * @param $slug
	 * @param $project
	 * @return mixed
	 */
	public function index( $category, $published)
	{
		($published === "moderation" ) ? $published = false : $published = true;

		$country = 'Австралия';

		$users = $this->forumPostRepository->getPostsWithCountry($published, $category, $country);

		return $users;
	}
}