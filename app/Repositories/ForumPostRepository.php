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
            'title',
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
     * @return mixed
     */
    public function getAllWithCategory($id)
    {
        $columns = [
            'id',
            'title',
            'text',
            'user_id',
            'category_id',
        ];

        $data = $this
            ->startConditions()
            ->select($columns)
            ->where('category_id', '=', $id)
            ->with(['category' => function ($query){
                $query->select(['id', 'title']);
            },
                'user'])
            ->get();

        return $data;
    }
}