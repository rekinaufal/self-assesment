<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuotaSeeder extends Seeder
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
                "limit_file" => 25,
                "price" => 25000,
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 2,
                "limit_file" => 50,
                "price" => 50000,
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 3,
                "limit_file" => 75,
                "price" => 75000,
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 4,
                "limit_file" => 100,
                "price" => 100000,
                "created_at" => date("Y-m-d H:i:s")
            ],
        ];

        DB::table("quotas")->insert($data);
    }
}
