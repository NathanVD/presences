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

        factory(User::class,10)->states('teacher')->create();
        factory(User::class,20)->states('student')->create();

        $teachers = User::all()->where('domain_type','App\Teach');
        $students = User::all()->where('domain_type','App\Study');

        foreach($teachers as $teacher){
            $teacher->roles()->attach($roles->where('name','Professeur')->first());
        };

        foreach($students as $student){
            $student->roles()->attach($roles->where('name','Étudiant')->first());
        };

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
