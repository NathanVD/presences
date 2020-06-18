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
            ['name' => 'Administrateur',],
            ['name' => 'Webmaster',],
            ['name' => 'Professeur',],
            ['name' => 'Étudiant',],
            ['name' => 'Membre',],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
