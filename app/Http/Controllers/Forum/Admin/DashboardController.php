<?php

namespace App\Http\Controllers\Forum\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ForumPostRepository;
use App\Repositories\ForumCategoryRepository;
use App\Repositories\UserRepository;

class 	DashboardController extends BaseController
{
	private $userRepository;
	private $forumPostRepository;
	private $forumCategoryRepository;

	/**
	 * construct new model for search in repository
	 *
	 * UserController constructor.
	 */
	public function __construct()
	{
		$this->userRepository = app(UserRepository::class);
		$this->forumPostRepository = app(ForumPostRepository::class);
		$this->forumCategoryRepository =app(ForumCategoryRepository::class);
	}

	/**
	 * Dashboard panel for admin
	 *
	 * @param ForumCategoryRepository $forumCategoryRepository
	 * @param ForumPostRepository $forumPostRepository
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
	 */
	public function index()
	{
		$data['count_users'] = $this->userRepository->getCountUser();
		$data['published'] = $this->forumPostRepository->getPublishedCount();
		$data['on_moderate'] = $this->forumPostRepository->getOnModerateCount();

		return $data;
	}

	/**
	 * @param Request $request
	 * @param $param
	 */
	public function settings(Request $request, $param)
	{
		if ($param === 'mail') {
			$environmentVariable = [
				'MAIL_USERNAME' => $request->MAIL_USERNAME,
				'MAIL_PASSWORD' => $request->MAIL_PASSWORD,
				'MAIL_ADMIN' => $request->MAIL_ADMIN
			];
			foreach ($environmentVariable as $item => $key)
			{
				if (!$key) {
					$environmentVariable[$item] = env($item);
				}else{
					self::changeEnvironmentVariable($item, $key);
				}
			}
		}

		if ($param === 'coordinate') {
			$environmentVariable = [
				'text' => $request->text,
				'coordinate1' => $request->coordinate1,
				'coordinate2' => $request->coordinate2
			];
//			$message = 'Eastern Technologies';
//			$number_item = 0;
//			$coordinates = [
//				0 => 27.539602518081665,
//				1 => 53.905047652725024
//			];
//			$mag = rand(20, 30);
//			foreach ($environmentVariable as $item => $key)
//			{
//				if (!$key) {
//					$environmentVariable[$item] = env($item);
//				}else{
//					self::changeMessagePlace($number_item, $message, $coordinates, $mag);
//				}
//			}

			$old_file = json_decode(Storage::disk('public')->get('ru.place.json'));
			$count = $old_file->features;


//			dd($count);

		}

//		dd(true);



		return $count;
	}

	/**
	 * get url project to asideBar
	 *
	 * @return mixed
	 */
	public function projectSlug()
	{
		$getAllProject = $this->forumCategoryRepository->getAllProject();

		return $getAllProject;
	}

	/**
	 * @param Request $request
	 * @return array
	 */
	public function show(Request $request)
	{
		$word = $request->value;

		$coutnry = json_decode(Redis::get('country'), true);

		$result = [];
		foreach ($coutnry as $key => $value) {
			if (mb_stripos($value, $word) !== false) {
				$result[] = $value;
			}
		}

		return $result;
	}

	/**
	 * Change or create new coordinate, message on Earth
	 *
	 * @param $item
	 * @param null $message
	 * @param null $coordinates
	 * @param null $mag
	 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
	 */
	public static function changeMessagePlace($item, $message = null, $coordinates = null, $mag = null)
	{
		if ($item <= 0) $item = 0;

		$old_file = json_decode(Storage::disk('public')->get('ru.place.json'));
		$count = count($old_file->features);

		if ($item >= $count) {
			$item = $count;
			$old_file->features[$item] = $old_file->features[0];
		}

		if ($mag) $old_file->features[$item]->properties->mag = $mag;
		if ($message) $old_file->features[$item]->properties->place = $message;
		if ($coordinates) $old_file->features[$item]->geometry->coordinates = $coordinates;

		$new_file = json_encode($old_file);
		json_encode(Storage::disk('public')->put('ru.place.json', $new_file));
	}

	/**
	 * Change email for recaptcha in environment file
	 *
	 * @param $key
	 * @param $value
	 */
	public static function changeEnvironmentVariable($key, $value)
	{
		$path = base_path('.env');

		if (env($key)) {
			$old = env($key);
		}

		if (file_exists($path)) {
			file_put_contents($path, str_replace(
				"$key=" . $old, "$key=" . $value, file_get_contents($path)
			));
		}
	}
}
