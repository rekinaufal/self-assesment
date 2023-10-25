<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermenperinCategorySeeder extends Seeder
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
                "name" => "Permenperin 16 Tahun 2011 - Barang",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
            [
                "id" => 2,
                "name" => "Permenperin 16 Tahun 2011 - Barang & Jasa",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
            [
                "id" => 3,
                "name" => "Permenperin 22 Tahun 2020 - Elektronik & Telematika",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
            [
                "id" => 4,
                "name" => "Permenperin 24 Tahun 2017 - Telepon seluler , Komputer Genggam & Komputer Tablet",
                "created_at" => date("Y-m-d H:i:s"),
                "updated_at" => NULL,
            ],
        ];

        DB::table("permenperin_categories")->insert($data);
    }
}
