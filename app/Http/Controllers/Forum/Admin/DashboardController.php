<?php

namespace App\Http\Controllers\Forum\Admin;

use App\Repositories\ForumPostRepository;
use Illuminate\Http\Request;
use App\Repositories\ForumCategoryRepository;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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




        $message = 'Eastern Technologies';
        $number_item = 0;
        $coordinates = [
        	0 => 27.539602518081665,
			1 => 53.905047652725024
		];
        $mag = rand( 20, 30);

        DashboardController::changeMessagePlace( $number_item, $message, $coordinates, $mag );

		dd(true);


//        DashboardController::changeEnvironmentVariable('MAIL_ADMIN', 'MObratstvo@gmail.com');

        $path =  file_get_contents(base_path('.env'));


//        dd($path);
    

        $published = $forumPostRepository->getAllPublishedPost();

        $post = $forumPostRepository->getAllWithPaginate(10);

        $item_en = Storage::disk('redis')->get('en.json');
        $item_ru = Storage::disk('redis')->get('ru.json');

        $coutnry =  [
            'en' => $item_en,
            'ru' => $item_ru,
        ];


        Redis::set('country', $item_ru);


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


    public static function changeMessagePlace ( $item, $message, $coordinates, $mag )
	{
		if ( $item <= 0 ) $item = 0;

		$old_file = json_decode(Storage::disk('public')->get('place.json'));
		$count = count( $old_file->features);

		dd($old_file->features);

		if ( $item >= $count ) {
			$item = $count;
			$old_file->features[$item] = $old_file->features[0];
		}

		$old_file->features[$item]->properties->mag = $mag;
		$old_file->features[$item]->properties->place = $message;
		$old_file->features[$item]->geometry->coordinates = $coordinates;

		$new_file = json_encode($old_file);
		json_encode(Storage::disk('public')->put('place.json', $new_file));
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
