<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserProfileSeeder extends Seeder
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
                "user_id" => 1,
                "fullname" => "Recki Naufal",
                "company_name" => "PT AMN Indonesia",
                "company_address" => "Bogor Kota",
                "phone_number" => "08123321123",
                "job_title" => "Programmer",
                "avatar" => "users/avatar/avatar_fullname_202310271359.jpg",
                "created_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 2,
                "user_id" => 2,
                "fullname" => "Brata Blezza",
                "company_name" => "PT AMN Indonesia",
                "company_address" => "Bogor Kota",
                "phone_number" => "08321123321",
                "job_title" => "Programmer",
                "avatar" => "users/avatar/avatar_fullname_202310271359.jpg",
                "created_at" => date("Y-m-d H:i:s"),
            ],
            [
                "id" => 3,
                "user_id" => 3,
                "fullname" => "Muhammad Ikhsan Bintang",
                "company_name" => "PT AMN Indonesia",
                "company_address" => "Bogor Kota",
                "phone_number" => "08111233333",
                "job_title" => "Programmer",
                "avatar" => "users/avatar/avatar_fullname_202310271359.jpg",
                "created_at" => date("Y-m-d H:i:s"),
            ],
        ];

        DB::table("user_profiles")->insert($data);
    }
}
