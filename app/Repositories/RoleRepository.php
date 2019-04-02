<?php
namespace App\Repositories;

use App\Models\Role as Model;

/**
 * Class RoleRepository
 *
 * @package App\Repositories
 */
class RoleRepository extends CoreRepository
{
	/**
	 * return string
	 */
	protected function getModelClass()
	{
		return Model::class;
	}

	/**
	 * @return mixed
	 */
	public function getAll()
	{
		$columns = [
			'id',
			'name'
		];

		$data = $this
			->startConditions()
			->select($columns)
			->get();

		return $data;
	}
}