<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role_User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        User::truncate();
        Role_User::truncate();

        $roles = Role::all();

        DB::table('users')->insert([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'email' => 'admin@school.com',
            'password' => bcrypt('12345678'),
            'img_path' => 'img/admin2.png',
            'phone' => null,
            'adress_road' => null,
            'adress_commune' => null,
            'domain_id' => null,
            'domain_type' => null,
            'classroom_id' => null,
            'confirmed' => 1,
        ]);

        $admin = User::where('email','admin@school.com')->first();
        $admin->roles()->attach($roles->where('name','Administrateur')->first());

        // factory(User::class,25)->create();

        // $little_roles = $roles->where('name','Member');
        // App\User::all()->each(function ($user) use ($little_roles) { 
        //     $user->roles()->attach($little_roles->pluck('id')->toArray()); 
        // });
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
