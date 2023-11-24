<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
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
                "user_id" => 2,
                "upgraded_category" => 2,
                "payment_method" => "cash",
                "bank_name" => "BCA",
                "bank_account_number" => "1231231231",
                "bank_account_name" => "Recki Naufal",
                "transaction_receipt" => "payments/transaction-receipt/ReckiNaufal_202310271552.png",
                "status" => "approved",
                "approved_by" => "Super Admin",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 2,
                "user_id" => 1,
                "upgraded_category" => 2,
                "payment_method" => "cash",
                "bank_name" => "BCA",
                "bank_account_number" => "1231231232",
                "bank_account_name" => "Bratta Blezza",
                "transaction_receipt" => "payments/transaction-receipt/BrattaBlezza_202310271552.png",
                "status" => "approved",
                "approved_by" => "Super Admin",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 3,
                "user_id" => 3,
                "upgraded_category" => 2,
                "payment_method" => "cash",
                "bank_name" => "BCA",
                "bank_account_number" => "1231231233",
                "bank_account_name" => "Muhammad Ikhsan Bintang",
                "transaction_receipt" => "payments/transaction-receipt/MuhammadIkhsanBintang_202310271552.png",
                "status" => "approved",
                "approved_by" => "Super Admin",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 4,
                "user_id" => 4,
                "upgraded_category" => 2,
                "payment_method" => "cash",
                "bank_name" => "BCA",
                "bank_account_number" => "1231231234",
                "bank_account_name" => "Admin",
                "transaction_receipt" => "payments/transaction-receipt/Admin_202310271552.png",
                "status" => "approved",
                "approved_by" => "Super Admin",
                "created_at" => date("Y-m-d H:i:s")
            ],
            [
                "id" => 5,
                "user_id" => 5,
                "upgraded_category" => 2,
                "payment_method" => "cash",
                "bank_name" => "BCA",
                "bank_account_number" => "1231231235",
                "bank_account_name" => "Staff IT",
                "transaction_receipt" => "payments/transaction-receipt/StaffIt_202310271552.png",
                "status" => "pending",
                "approved_by" => NULL,
                "created_at" => date("Y-m-d H:i:s")
            ],
        ];

        DB::table("payments")->insert($data);
    }
}
