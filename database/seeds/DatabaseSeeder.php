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
        $this->call(CountriesTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(ForumCategoriesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        factory(App\Models\ForumPost::class, 100)->create();
    }
}
