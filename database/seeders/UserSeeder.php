<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
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

        $faker = Factory::create();

        for ($i = 6; $i <= 30; $i++) {
            DB::table('users')->insert([
                "id" => $i,
                "email" => $faker->email,
                "email_verified_at" => Carbon::now(),
                "password" => Hash::make("password"),
                "user_category_id" => 1,
                "is_active" => true,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]);
        }
    }
}
