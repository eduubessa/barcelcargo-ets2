<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Utils\Constants\PermissionInterface;
use App\Utils\Constants\RoleInterface;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(count(RoleInterface::BARCEL_ROLES) > 0) {
            foreach(RoleInterface::BARCEL_ROLES as $name => $description) {
                $role = Role::where('slug', strtolower($name))->first();

                if(
                    count(PermissionInterface::BARCEL_PERMISSION_LIST) > 0 and
                    count(PermissionInterface::BARCEL_PERMISSION_CRUD) > 0
                ) {
                    foreach(PermissionInterface::BARCEL_PERMISSION_LIST as $permissions)
                    {
                        foreach (PermissionInterface::BARCEL_PERMISSION_CRUD as $crud)
                        {
                            $constant_name = strtoupper("barcel_permission_" . $crud . "_" . $permissions);
                            $constant_name = "App\Utils\Constants\PermissionInterface::" . $constant_name;
                            $permission = Permission::where('constant_name', constant($constant_name))->first();

                            DB::table('roles_permissions')->insert([
                                'role_id' => $role->id,
                                'permission_id' => $permission->id,
                                'level' => 7
                            ]);
                        }
                    }
                }

            }
        }
    }
}
