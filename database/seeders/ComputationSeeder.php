<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComputationSeeder extends Seeder
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
                'id' => 1,
                'category_permenkerin_id' => 1,
                'production_result' => 'Makanan Ringan',
                'product_type' => 'Keripik Kentang',
                'specification' => 'Rasa Original',
                'brand' => 'Brand A',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 2,
                'category_permenkerin_id' => 1,
                'production_result' => 'Produk Olahan Daging',
                'product_type' => 'Sosis',
                'specification' => 'Daging Ayam',
                'brand' => 'Brand B',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 3,
                'category_permenkerin_id' => 1,
                'production_result' => 'Produk Roti',
                'product_type' => 'Roti Tawar',
                'specification' => 'Ukuran Sedang',
                'brand' => 'Brand C',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 4,
                'category_permenkerin_id' => 1,
                'production_result' => 'Minuman Kemasan',
                'product_type' => 'Air Mineral',
                'specification' => 'Botol 500ml',
                'brand' => 'Brand D',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 5,
                'category_permenkerin_id' => 2,
                'production_result' => 'Kain Katun',
                'product_type' => 'Kain Tenun',
                'specification' => 'Motif Bunga',
                'brand' => 'Brand X',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 6,
                'category_permenkerin_id' => 2,
                'production_result' => 'Pakaian Wanita',
                'product_type' => 'Dress',
                'specification' => 'Warna Merah',
                'brand' => 'Brand Y',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 7,
                'category_permenkerin_id' => 2,
                'production_result' => 'Pakaian Pria',
                'product_type' => 'Kemeja',
                'specification' => 'Model Formal',
                'brand' => 'Brand Z',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 8,
                'category_permenkerin_id' => 2,
                'production_result' => 'Kain Wol',
                'product_type' => 'Kain Wol Gabardine',
                'specification' => 'Warna Hitam',
                'brand' => 'Brand W',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 9,
                'category_permenkerin_id' => 3,
                'production_result' => 'Bahan Kimia',
                'product_type' => 'Pupuk',
                'specification' => 'Pupuk Organik',
                'brand' => 'Brand P',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 10,
                'category_permenkerin_id' => 3,
                'production_result' => 'Obat-Obatan',
                'product_type' => 'Antibiotik',
                'specification' => 'Tablet',
                'brand' => 'Brand Q',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 11,
                'category_permenkerin_id' => 3,
                'production_result' => 'Produk Petrokimia',
                'product_type' => 'Petrokimia A',
                'specification' => 'Bubuk',
                'brand' => 'Brand R',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 12,
                'category_permenkerin_id' => 3,
                'production_result' => 'Produk Kimia Industri',
                'product_type' => 'Zat Kimia X',
                'specification' => 'Cairan',
                'brand' => 'Brand S',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 13,
                'category_permenkerin_id' => 4,
                'production_result' => 'Mobil Penumpang',
                'product_type' => 'Sedan',
                'specification' => 'Model A',
                'brand' => 'Brand M',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 14,
                'category_permenkerin_id' => 4,
                'production_result' => 'Kendaraan Komersial',
                'product_type' => 'Truk',
                'specification' => 'Truk Berat',
                'brand' => 'Brand N',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 15,
                'category_permenkerin_id' => 4,
                'production_result' => 'Kendaraan Listrik',
                'product_type' => 'Mobil Listrik',
                'specification' => 'Hibrida',
                'brand' => 'Brand O',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
            [
                'id' => 16,
                'category_permenkerin_id' => 4,
                'production_result' => 'Kendaraan Offroad',
                'product_type' => 'Jeep',
                'specification' => 'Model Offroad',
                'brand' => 'Brand P',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => NULL
            ],
        ];

        DB::table("computations")->insert($data);
    }
}
