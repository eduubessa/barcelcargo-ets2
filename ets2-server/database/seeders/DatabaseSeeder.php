<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PermissionTableSeeder::class,
            RoleTableSeeder::class,
            RolePermissionTableSeeder::class,
            UserTableSeeder::class,
            BankTableSeeder::class,
            //JobsTableSeeder::class,
        ]);
    }
}
