<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                "name" => "Admin",
                "created_at" => new DateTime(),
            ],
            [
                "name" => "Manager",
                "created_at" => new DateTime(),
            ],
            [
                "name" => "User",
                "created_at" => new DateTime(),
            ],
        ]);
    }
}
