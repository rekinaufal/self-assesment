<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                "fullname" => "Reki Naufal",
                "email" => "rekinaufal@gmail.com",
                "email_verified_at" => date("Y-m-d H:i:s"),
                "password" => Hash::make("1234"),
                "user_category_id" => 2,
                "is_active" => true,
                "remember_token" => NULL,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
            [
                "id" => 2,
                "fullname" => "Brata Blessza",
                "email" => "bratablessza@gmail.com",
                "email_verified_at" => date("Y-m-d H:i:s"),
                "password" => Hash::make("admin"),
                "user_category_id" => 2,
                "is_active" => true,
                "remember_token" => NULL,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
            [
                "id" => 3,
                "fullname" => "Muhammad Ikhsan Bintang",
                "email" => "ikhsanbintang@gmail.com",
                "email_verified_at" => date("Y-m-d H:i:s"),
                "password" => Hash::make("password"),
                "user_category_id" => 2,
                "is_active" => true,
                "remember_token" => NULL,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
            [
                "id" => 4,
                "fullname" => "Administrator",
                "email" => "admin@gmail.com",
                "email_verified_at" => date("Y-m-d H:i:s"),
                "password" => Hash::make("password"),
                "user_category_id" => 2,
                "is_active" => true,
                "remember_token" => NULL,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
            [
                "id" => 5,
                "fullname" => "Staff IT",
                "email" => "staffit@gmail.com",
                "email_verified_at" => date("Y-m-d H:i:s"),
                "password" => Hash::make("password"),
                "user_category_id" => 1,
                "is_active" => true,
                "remember_token" => NULL,
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
        ];

        DB::table('users')->insert($data);
    }
}
