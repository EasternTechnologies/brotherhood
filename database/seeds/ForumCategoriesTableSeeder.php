<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumCategoriesTableSeeder extends Seeder
{
    /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
    {
		$categories = [];

		for ( $i = 1; $i <= 5; $i ++ ) {
			$cName = 'Проект #' . $i;

			$categories[] = [
				'title' => $cName,
			];
		}

		DB::table( 'forum_categories' )->insert( $categories );
	}
}
