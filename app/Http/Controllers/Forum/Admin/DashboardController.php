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

        // $test = json_decode(File::get('/var/www/brotherhood/public/place.json'));

//        DashboardController::changeEnvironmentVariable('amoisa@gmail.com');
        // DashboardController::changeEnvironmentVariable('MAIL_ADMIN', 'amoisa@gmail.com');



        // $path =  file_get_contents(base_path('.env'));

//        $i = gettype(env($key));.

//        $old = env($key)? 'true' : 'false';

//        dd($path);


        $published = $forumPostRepository->getAllPublishedPost();

        $post = $forumPostRepository->getAllWithPaginate(10);

        $item_en = Storage::disk('redis')->get('en.json');
        $item_ru = Storage::disk('redis')->get('ru.json');

        $coutnry =  [
            'en' => $item_en,
            'ru' => $item_ru,
        ];


        Redis::set('country', $item_en);

        Redis::set('ru', 'country_list_ru');

        $category = $forumCategoryRepository->getForComboBox();

        return view('forum.admin.dashboard.index', compact('category', 'post'));

    }

    public function show (Request $request)
    {

        $word = $request->value;

        $coutnry = json_decode(Redis::get('country'),true);

        $result = [];
        foreach($coutnry as $key => $value){
            if(stripos($value, $word) !== false){
                $result[]= $value;
            }
        }
        return $result;


    }

    // public static function changeEnvironmentVariable($key,$value)
    // {
    //     $path = base_path('.env');

    //     if(env($key))
    //     {
    //         $old = env($key)? 'true' : 'false';
    //     }

    //     if (file_exists($path)) {
    //         file_put_contents($path, str_replace(
    //             "$key=".$old, "$key=".$value, file_get_contents($path)
    //         ));
    //     }
    // }

//    public static function changeEnvironmentVariable($value)
//    {
//        $path = base_path('.env');
//
//            $old = env('MAIL_ADMIN')? 'true' : 'false';
//
//        if (file_exists($path)) {
//            file_put_contents($path, str_replace(
//                'MAIL_ADMIN='.$old, 'MAIL_ADMIN='.$value, file_get_contents($path)
//            ));
//        }
//    }
}
