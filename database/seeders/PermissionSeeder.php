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
        // START ROLE
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
        // END ROLE
    
        // START USER
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
        // END USER
    
        // START PAYMENT
            [
                "id" => 11,
                "name" => "payment-list",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 12,
                "name" => "payment-view",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 13,
                "name" => "payment-approve",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
        // END PAYMENT
    
        // START NEWS
            [
                "id" => 14,
                "name" => "news-list",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 15,
                "name" => "news-create",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 16,
                "name" => "news-edit",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 17,
                "name" => "news-delete",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 18,
                "name" => "news-show",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
        // END NEWS
    
        // START PERMEN CATEGORY
            [
                "id" => 19,
                "name" => "permenperin-category-list",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 20,
                "name" => "permenperin-category-create",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 21,
                "name" => "permenperin-category-edit",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 22,
                "name" => "permenperin-category-delete",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 23,
                "name" => "permenperin-category-show",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
        // END PERMEN CATEGORY
    
        // START NEED
            [
                "id" => 24,
                "name" => "need-list",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 25,
                "name" => "need-create",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 26,
                "name" => "need-edit",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 27,
                "name" => "need-delete",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
        // END NEED

        // START CALCULATION
            [
                "id" => 28,
                "name" => "calculation-list",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 29,
                "name" => "calculation-create",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 30,
                "name" => "calculation-edit",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
            [
                "id" => 31,
                "name" => "calculation-delete",
                "guard_name" => "web",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL
            ],
        // END CALCULATION
        ];

        DB::table("permissions")->insert($data);
    }
}
