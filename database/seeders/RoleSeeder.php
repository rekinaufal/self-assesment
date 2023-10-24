<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "id" => 1,
                "name" => "Administrator",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 2,
                "name" => "Staff IT",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
        ];

        DB::table("roles")->insert($data);
    }
}
