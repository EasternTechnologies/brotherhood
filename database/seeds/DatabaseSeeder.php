<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ForumCategoriesTableSeeder::class);
        factory(App\Models\User::class, 10)->create();
        factory(App\Models\ForumPost::class, 100)->create();
    }
}
