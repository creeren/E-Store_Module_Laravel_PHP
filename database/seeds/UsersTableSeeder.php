<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::table('wishlists')->truncate();

       User::truncate();
       $adminRole = Role::where('name', 'admin')->first();
       $userRole = Role::where('name', 'user')->first();
       $admin = User::create([
           'name' => 'Admin',
           'email' => 'admin@admin.com',
           'password' => bcrypt('admin')
    ]);
       $user = User::create([
           'name' => 'user',
           'email' => 'user@user.com',
           'password' => bcrypt('user')
       ]);
       $admin->roles()->attach($adminRole);
       $user->roles()->attach($userRole);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
