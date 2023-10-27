<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regularBenefits = [
            "Testing Benefit Regular 1",
            "Testing Benefit Regular 2",
        ];
        $regularBenefits = json_encode($regularBenefits);

        $premiumBenefits = [
            "Testing Benefit Premium 1",
            "Testing Benefit Premium 2",
        ];
        $premiumBenefits = json_encode($premiumBenefits);

        $data = [
            [
                "id" => 1,
                "name" => "Regular",
                "benefits" => $regularBenefits,
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 2,
                "name" => "Premium",
                "benefits" => $premiumBenefits,
                "created_at" => date("Y-m-d H:i:s")
            ]
        ];

        DB::table("user_categories")->insert($data);
    }
}
