<?php

namespace App\Repositories;

use App\Models\ForumCategory as Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ForumCategoryRepository
 *
 * @package App\Repositories
 */
class ForumCategoryRepository extends CoreRepository
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
        return $this->startConditions()->all();
    }
}