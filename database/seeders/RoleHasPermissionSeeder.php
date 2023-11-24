<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleHasPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = DB::table("permissions")->get();
        $roleAdministrator = DB::table("roles")->find(1);
        $roleStaffIt = DB::table("roles")->find(2);
        $permissionStaffIt = [1, 2, 5, 6, 7, 10];

        foreach ($permissions as $permission) {
            DB::table("role_has_permissions")->insert([
                "permission_id" => $permission->id,
                "role_id" => $roleAdministrator->id,
            ]);
            if(in_array($permission->id, $permissionStaffIt)) {
                DB::table("role_has_permissions")->insert([
                    "permission_id" => $permission->id,
                    "role_id" => $roleStaffIt->id,
                ]);
            }
        }
    }
}
