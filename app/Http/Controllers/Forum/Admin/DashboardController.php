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
     * Display a listing of the resource.
     *
     * @param ForumCategoryRepository $forumCategoryRepository
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ForumCategoryRepository $forumCategoryRepository, ForumPostRepository $forumPostRepository)
    {

//        Redis::set('category' , 1);
//
//        $coutnry = Redis::get('category');
//        dd($coutnry);

        $published = $forumPostRepository->getAllPublishedPost();



        $post = $forumPostRepository->getAllWithPaginate(10);

        $item_en = Storage::disk('redis')->get('en.json');
        $item_ru = Storage::disk('redis')->get('ru.json');

        $coutnry =  [
            'en' => $item_en,
            'ru' => $item_ru,
        ];

        Redis::set('country', json_encode($coutnry));

        $coutnry = Redis::get('country');

        $category = json_decode($coutnry);

        $b = json_decode($category->ru);

//        dd($b);
        $category = $forumCategoryRepository->getForComboBox();

        return view('forum.admin.dashboard.index', compact('category', 'post'));

    }

    public function show (Request $request)
    {
        dd($request);
    }
}
