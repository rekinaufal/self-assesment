<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
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
                "name" => "role-list",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 2,
                "name" => "role-create",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 3,
                "name" => "role-edit",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 4,
                "name" => "role-delete",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 5,
                "name" => "role-show",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 6,
                "name" => "user-list",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 7,
                "name" => "user-create",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 8,
                "name" => "user-edit",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 9,
                "name" => "user-delete",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 10,
                "name" => "user-show",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 11,
                "name" => "user-excel",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 12,
                "name" => "user-pdf",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
        ];

        DB::table("permissions")->insert($data);
    }
}
