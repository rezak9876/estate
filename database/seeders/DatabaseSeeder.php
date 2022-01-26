<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Role\Database\Seeders\RoleTableSeeder;
use Modules\Term\Database\Seeders\TermTableSeeder;
use Modules\User\Database\Seeders\UserTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TermTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
    }
}
