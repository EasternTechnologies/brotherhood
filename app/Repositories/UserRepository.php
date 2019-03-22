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
	public function getAllUsers( $wordSearch, $columnSearch )
	{
		$columns = [
			'users.name as name',
			'users.email as email',
			'users.phone as phone',
			'countries.ru as country',
			'roles.name as roles'
		];

		$data = $this
			->startConditions()
			->select($columns)
			->leftjoin('countries', 'country_id', '=', 'countries.id')
			->leftjoin('role_user', 'users.id', '=', 'role_user.user_id')
			->leftjoin('roles', 'role_user.role_id', '=', 'roles.id')
			->when($wordSearch, function ($query) use ($columnSearch, $wordSearch) {
				return $query->where($columnSearch, 'like', '%' . $wordSearch . '%');
			})
			->orderBy('users.name')
//			->get();
			->paginate(20);

		return $data;
	}
}