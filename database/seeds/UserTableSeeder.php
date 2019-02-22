<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'User')->first();
        $role_admin  = Role::where('name', 'Admin')->first();
        $role_moderator  = Role::where('name', 'Moderator')->first();

        $user = new User();
        $user->name = 'User Name';
        $user->email = 'user@example.com';
        $user->country = rand(1, 10);
        $user->phone = rand(1000, 100000);
        $user->password = bcrypt('user');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->name = 'admin Name';
        $admin->email = 'admin@example.com';
        $admin->country = rand(1, 10);
        $admin->phone = rand(1000, 100000);
        $admin->password = bcrypt('admin');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $moderator = new User();
        $moderator->name = 'Moderator Name';
        $moderator->email = 'moderator@example.com';
        $moderator->country = rand(1, 10);
        $moderator->phone = rand(1000, 100000);
        $moderator->password = bcrypt('moderator');
        $moderator->save();
        $moderator->roles()->attach($role_moderator);
    }
}
