<?php

namespace App\Http\Controllers\Forum\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
	 * @return mixed
	 */
	public function show(Request $request)
	{

//		dd($request);
//		$users = $this->userRepository->getAllUsers();

		return true;
	}
}
