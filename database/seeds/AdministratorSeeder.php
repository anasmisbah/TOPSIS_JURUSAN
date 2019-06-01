<?php

use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email'=>'administrator@mail.com',
            'name'=>'administrator',
            'password'=>\Hash::make('administrator')
        ]);
    }
}
