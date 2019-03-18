<?php

namespace App\Http\Controllers\Forum\Admin;

use App\Repositories\ForumPostRepository;
use Illuminate\Http\Request;
use App\Repositories\ForumCategoryRepository;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class DashboardController extends BaseController
{
	/**
	 * Dashboard panel for admin
	 *
	 * @param ForumCategoryRepository $forumCategoryRepository
	 * @param ForumPostRepository $forumPostRepository
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
	 */
    public function index(ForumCategoryRepository $forumCategoryRepository, ForumPostRepository $forumPostRepository)
    {	
        $message = 'Eastern Technologies';
        $number_item = 0;
        $coordinates = [
        	0 => 27.539602518081665,
			1 => 53.905047652725024
		];
        $mag = rand( 20, 30 );

        DashboardController::changeMessagePlace( $number_item, $message, $coordinates, $mag );

//        DashboardController::changeEnvironmentVariable('MAIL_ADMIN', 'MObratstvo@gmail.com');

//        $path =  file_get_contents(base_path('.env'));

//        $published = $forumPostRepository->getAllPublishedPost();

        $post = $forumPostRepository->getAllWithPaginate(10);

        $category = $forumCategoryRepository->getForComboBox();

        return view('forum.admin.dashboard.index', compact('category', 'post'));

    }

	/**
	 * @param Request $request
	 * @return array
	 */
    public function show (Request $request)
    {
        $word = $request->value;

        $coutnry = json_decode(Redis::get('country'),true);

        $result = [];
        foreach ( $coutnry as $key => $value ) {
            if ( mb_stripos ( $value, $word ) !== false){
                $result[]= $value;
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
    public static function changeMessagePlace ( $item, $message = null, $coordinates = null, $mag = null )
	{
		if ( $item <= 0 ) $item = 0;

		$old_file = json_decode(Storage::disk('public')->get('ru.place.json'));
		$count = count( $old_file->features);

		if ( $item >= $count ) {
			$item = $count;
			$old_file->features[$item] = $old_file->features[0];
		}

		if ( $mag ) $old_file->features[$item]->properties->mag = $mag;
		if ( $message ) $old_file->features[$item]->properties->place = $message;
		if ( $coordinates ) $old_file->features[$item]->geometry->coordinates = $coordinates;

		$new_file = json_encode($old_file);
		json_encode(Storage::disk('public')->put('ru.place.json', $new_file));
	}

	/**
	 * Change email for recaptcha in environment file
	 *
	 * @param $key
	 * @param $value
	 */
    public static function changeEnvironmentVariable( $key,$value )
    {
        $path = base_path('.env');

        if ( env( $key ))
        {
            $old = env( $key );
        }

        if ( file_exists ( $path )) {
            file_put_contents ( $path, str_replace (
                "$key=".$old, "$key=".$value, file_get_contents( $path )
            ));
        }
    }
}
