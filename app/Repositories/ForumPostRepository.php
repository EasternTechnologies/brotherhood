<?php

namespace App\Repositories;

use App\Models\ForumPost as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ForumPostRepository
 *
 * @package App\Repositories
 */
class ForumPostRepository extends CoreRepository
{
    /**
     * return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     * Get model for edit in admin
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }

    /**
     * Get list category for show on collection list
     *
     * @return Collection
     */
    public function getForComboBox()
    {
        $columns = implode(', ', [
            'id',
            'CONCAT (id, ". ", title) AS id_title',
        ]);

        $data = $this
            ->startConditions()
            ->selectRaw($columns)
            ->toBase()
            ->get();

        return $data;
    }

    /**
     * @param int|null $perPage
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getAllWithPaginate($perPage = null)
    {
        $columns = [
            'id',
            'text',
            'is_published',
            'user_id',
            'category_id',
        ];

        $data = $this
            ->startConditions()
            ->select($columns)
            ->orderBy('id', 'DESC')
            ->with(['user', 'category'])
            ->paginate(20);

        return $data;
    }

    /**
     * Get all published post
     *
     * @return mixed
     */
    public function getAllPublishedPost()
    {
        $columns = implode(', ', [
            'id',
            'title',
        ]);

        $data = $this
            ->startConditions()
            ->selectRaw($columns)
            ->where('is_published', false)
            ->toBase()
            ->get();

        return $data;
    }


	/**
	 * Get all count published post
	 *
	 * @return mixed
	 */
    public function getPublishedCount()
	{
		$data = $this
			->startConditions()
			->where('is_published', true)
			->count();

		return $data;
	}

	/**
	 * Get all count on moderate post
	 *
	 * @return mixed
	 */
	public function getOnModerateCount()
	{
		$data = $this
			->startConditions()
			->where('is_published', false)
			->count();

		return $data;
	}

    /**
	 * Get all published post with country
	 *
     * @return mixed
     */
    public function getAllWithCategory($id, $start, $county)
    {
        $columns = [
			'forum_posts.id',
            'forum_posts.text',
            'forum_posts.user_id',
            'forum_posts.category_id',
			'forum_posts.country_id',
			'forum_posts.created_at'
        ];

        $data = $this
            ->startConditions()
            ->select($columns)
			->leftjoin('countries', 'country_id', '=', 'countries.id')
			->where([
				['forum_posts.category_id', '=', $id],
				['forum_posts.is_published', true],
			])
			->when($county, function ($query, $county) {
				return $query->where('countries.name', $county);
			})
            ->offset($start)
            ->limit(15)
            ->with(['category' => function ($query){
                $query->select
				([
                	'id',
					'title'
				]);
            },
                'user'
				=> function ($querty) {
            	$querty->select
				([
					'id',
            		'name'
				]);

			}])
			->orderBy('forum_posts.created_at', 'DESC')
			->get();

        return $data;
    }

	/**
	 * get all post with country (search)
	 *
	 * @param $published
	 * @param $category
	 * @param null $country
	 * @return mixed
	 */
    public function getPostsWithCountry($published, $category, $country = null)
	{
		$columns = [
			'forum_posts.id',
			'forum_posts.text',
			'forum_posts.user_id',
			'forum_posts.category_id',
			'forum_posts.created_at',
			'forum_posts.updated_at',
			'forum_posts.country_id',
			'countries.ru',
		];

		$data = $this
			->startConditions()
			->select($columns)
			->leftJoin('forum_categories', 'category_id', '=', 'forum_categories.id')
			->leftjoin('countries', 'country_id', '=', 'countries.id')
			->where([
				['forum_posts.is_published', '=', $published],
				['forum_categories.slug', '=', $category ]
			])
			->when($country, function ($query) use ($country) {
				return $query
					->where('countries.ru', '=', $country );
			})
			->orderBy('forum_posts.created_at', 'DESC')
			->paginate(20);

		return $data;
	}
}