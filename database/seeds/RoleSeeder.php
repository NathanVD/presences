<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Role::truncate();

        DB::table('roles')->insert([
            'name' => 'Administrateur',
        ]);

        DB::table('roles')->insert([
            'name' => 'Webmaster',
        ]);

        DB::table('roles')->insert([
            'name' => 'Professeur',
        ]);

        DB::table('roles')->insert([
            'name' => 'Étudiant',
        ]);

        DB::table('roles')->insert([
            'name' => 'Membre',
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
