<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Estate\Database\Seeders\EstateTableSeeder;
use Modules\Facility\Database\Seeders\FacilityTableSeeder;
use Modules\Permission\Database\Seeders\PermissionTableSeeder;
use Modules\Role\Database\Seeders\RoleTableSeeder;
use Modules\Setting\Database\Seeders\SettingTableSeeder;
use Modules\Term\Database\Seeders\TermTableSeeder;
use Modules\User\Database\Seeders\UserTableSeeder;
use Modules\UseType\Database\Seeders\UseTypeTableSeeder;
use Modules\UseTypeProperty\Database\Seeders\UseTypePropertyTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FacilityTableSeeder::class);
        $this->call(TermTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        // $this->call(UserTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        
        User::factory()->create();
        $this->call(UseTypeTableSeeder::class);
        $this->call(UseTypePropertyTableSeeder::class);
        $this->call(EstateTableSeeder::class);
        // $this->call(SettingTableSeeder::class);
    }
}
