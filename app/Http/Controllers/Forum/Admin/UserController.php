<?php

namespace App\Http\Controllers\Forum\Admin;

use App\Models\Role;
use App\Models\User;
use App\Repositories\RoleRepository;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends BaseController
{
	private $userRepository;
	private $roleRepository;

	/**
	 * construct new model for search in repository
	 *
	 * UserController constructor.
	 */
	public function __construct()
	{
		$this->userRepository = app(UserRepository::class);
		$this->roleRepository = app(RoleRepository::class);
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

	/**
	 * get user for edit in admin panel
	 *
	 * @param Request $request
	 * @return mixed
	 */
	public function edit(Request $request)
	{
		$data['user'] = $this->userRepository->getEdit($request->id);
		$data['role'] = $this->roleRepository->getAll();

		return $data;
	}

	/**
	 * update user
	 *
	 * @param Request $request
	 * @return mixed
	 */
	public function updateUser(Request $request)
	{
		return $request;

//		$post = $this->forumPostRepository->getEdit($request->params['id']);
//		if ($request->params['userId']) $post->user_id = $request->params['userId'];
//		$post->text = $request->params['text'];
//		$post->updated_at = now();
//		if ($request->params['country']) {
//			$post->country_id = $this->countryRepository->getIdRu($request->params['country']);
//		};
//		$post->save();

//		return $user;
	}
}
