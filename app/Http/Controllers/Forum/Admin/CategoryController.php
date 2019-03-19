<?php

namespace App\Http\Controllers\Forum\Admin;

use Illuminate\Http\Request;
use App\Models\ForumCategory;
use App\Repositories\ForumCategoryRepository;

class CategoryController extends BaseController
{
    /**
     * @var ForumCategoryRepository
     */
    private $forumCategoryRepository;

    public function __construct()
    {
        $this->forumCategoryRepository = app(ForumCategoryRepository::class);
    }

    /**
     * Display a listing of the resource.
     *     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(1);

        $pagination = $this->forumCategoryRepository->getAllWithPaginate(10);

        return view('forum.admin.category.index', compact('pagination'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newCategory =new ForumCategory();
        $category = $this->forumCategoryRepository->getForComboBox();

        return view('forum.admin.category.index', compact('newCategory', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd(__METHOD__);
        $data = $request->input();

        $item = (new ForumCategory())->create($data);

        return redirect()->route('categories.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd(__METHOD__);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->forumCategoryRepository->getEdit($id);
        dd($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd(__METHOD__);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd(__METHOD__);

    }
}
