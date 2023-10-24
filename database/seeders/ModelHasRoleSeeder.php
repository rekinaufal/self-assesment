<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = DB::table("users")->get();
        $administratorRole = DB::table("roles")->find(1);
        $staffItRole = DB::table("roles")->find(2);

        $userAdminIds = [1, 2, 3, 4];

        foreach ($users as $user) {
            if(in_array($user->id, $userAdminIds)) {
                DB::table("model_has_roles")->insert([
                    "role_id" => $administratorRole->id,
                    "model_type" => "App\\Models\\User",
                    "model_id" => $user->id
                ]);
            } else {
                DB::table("model_has_roles")->insert([
                    "role_id" => $staffItRole->id,
                    "model_type" => "App\\Models\\User",
                    "model_id" => $user->id
                ]);
            }
        }
    }
}
