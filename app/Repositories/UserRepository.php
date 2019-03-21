<?php
namespace App\Repositories;

use App\Models\User as Model;

/**
 * Class UserRepository
 *
 * @package App\Repositories
 */
class UserRepository extends CoreRepository
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
	public function getUser($email)
	{
		$data = $this
			->startConditions()
			->where('email', '=', $email)
			->first();

		return $data;
	}

	public function getCountUser()
	{
		$data = $this
			->startConditions()
			->count();

		return $data;
	}

	public function getAllUsers()
	{
		$columns = [
			'users.name',
			'users.email',
			'users.phone',
			'countries.name',
		];

		$data = $this
			->startConditions()
			->select($columns)
			->leftjoin('countries', 'country_id', '=', 'countries.id')
			->with(['roles' => function ($query){
				$query->select
				([
					'id',
					'name'
				]);
			}])
			->orderBy('users.name')
			->get();

		return $data;
	}
}