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

	/**
	 * @return mixed
	 */
	public function getAllUsers( $county = null )
	{
		$columns = [
			'users.name as name',
			'users.email as email',
			'users.phone as phone',
			'countries.name as country',
			'roles.name as roles'
		];

		$data = $this
			->startConditions()
			->select($columns)
			->leftjoin('countries', 'country_id', '=', 'countries.id')
			->leftjoin('role_user', 'users.id', '=', 'role_user.user_id')
			->leftjoin('roles', 'role_user.role_id', '=', 'roles.id')
			->when($county, function ($query, $county) {
				return $query->where('countries.name', $county);
			})
			->orderBy('users.name')
			->get();

		return $data;
	}
}