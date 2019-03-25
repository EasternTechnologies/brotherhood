<?php

namespace App\Http\Controllers\Forum\Admin;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends BaseController
{
	private $userRepository;

	/**
	 * construct new model for search in repository
	 *
	 * UserController constructor.
	 */
	public function __construct()
	{
		$this->userRepository = app(UserRepository::class);
	}

	/**
	 * Show all user with search column
	 *
	 * @param Request $request
	 * @return mixed
	 */
	public function show(Request $request)
	{
		$wordSearch = $request->selectedSearch;
		$columnSearch = $request->selected;

		$users = $this->userRepository->getAllUsers($wordSearch, $columnSearch);

		return $users;
	}
}
