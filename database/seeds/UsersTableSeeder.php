<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=> str_random(10),
            'is_active'=> 1,
            'role_id'=>2,
            'email'=> str_random(10).'@solutions.com',
            'password'=> bcrypt(123456),
        ]);
    }
}
