<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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


        DB::table('users')->insert(
            [
                'name' => env('CUSTOMER_NAME'),
                'email' => 'info@demo.com',
                'mobile' => env('CUSTOMER_MOBILE'),
                'password' => Hash::make(env('CUSTOMER_PASSWORD')),
                'role_id' => 1,
            ]
        );

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
