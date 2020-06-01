<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'created_at' => new DateTime(),
            ],
            [
                'id' => 2,
                'name' => 'Manager',
                'created_at' => new DateTime(),
            ],
            [
                'id' => 3,
                'name' => 'User',
                'created_at' => new DateTime(),
            ],
        ]);
    }
}
