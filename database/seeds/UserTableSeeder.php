<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        \DB::table('users')->insert([
            [
                'name'      => 'Admin',
                'email'     => 'admin@gmail.com',
                'address'   => 'Đà Nẵng',
                'password'  => bcrypt('admin123'),
                'role_id'   => '1',
                'status'    =>  '1',
                'created_at'    => new DateTime
            ],
            [
                'name'      => 'Manager',
                'email'     => 'manager@gmail.com',
                'address'   => 'Đà Nẵng',
                'password'  => bcrypt('demo123'),
                'role_id'   => '2',
                'status'    =>  '1',
                'created_at'    => new DateTime
            ]
        ]);
    }
}
