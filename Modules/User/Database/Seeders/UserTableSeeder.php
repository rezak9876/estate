<?php

namespace Modules\User\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        User::factory()->create(1);

        DB::table('users')->insert(
            [
                'name' => 'اکانت مشتری',
                'email' => 'customer@demo.com',
                'mobile' => '09900048776',
                'password' => Hash::make('1'),
                'role_id' => 2,
            ]
        );
    }
}
