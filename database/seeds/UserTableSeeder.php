<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => "admin", 'email' => "admin@example.com", 'password' => Hash::make("admin"), 'created_at' => new DateTime(), 'updated_at' => new DateTime(),]
        ]);
    }
}
