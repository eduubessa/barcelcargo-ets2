<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Utils\Constants\PermissionInterface;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(count(PermissionInterface::BARCEL_PERMISSION_LIST) > 0) {

            foreach(PermissionInterface::BARCEL_PERMISSION_LIST as $permissions)
            {
                foreach (PermissionInterface::BARCEL_PERMISSION_CRUD as $crud)
                {
                    $title = strtoupper("barcel_permission_title_" . $crud . "_" . $permissions);
                    $constant_name = strtoupper("barcel_permission_" . $crud . "_" . $permissions);

                    $permission = new Permission();
                    $permission->title = constant("\App\Utils\Constants\PermissionInterface::" . $title);
                    $permission->constant_name = constant("\App\Utils\Constants\PermissionInterface::" . $constant_name);
                    $permission->save();
                }
            }
        }
    }
}
