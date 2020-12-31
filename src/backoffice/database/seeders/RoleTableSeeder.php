<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Utils\Constants\RoleInterface;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(count(RoleInterface::BARCEL_ROLES) > 0){
            foreach(RoleInterface::BARCEL_ROLES as $name => $description)
            {
                $role = new Role();
                $role->title = ucfirst($name);
                $role->description = $description;
                $role->slug = strtolower($name);
                $role->save();
            }
        }


    }
}
