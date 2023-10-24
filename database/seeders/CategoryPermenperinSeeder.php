<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryPermenperinSeeder extends Seeder
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
                "name" => "Permenperin 1: Industri Makanan dan Minuman",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
            [
                "id" => 2,
                "name" => "Permenperin 2: Industri Tekstil dan Pakaian",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
            [
                "id" => 3,
                "name" => "Permenperin 3: Industri Kimia dan Farmasi",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
            [
                "id" => 4,
                "name" => "Permenperin 4: Industri Otomotif",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
        ];

        DB::table("category_permenperins")->insert($data);
    }
}
