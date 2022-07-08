<?php

namespace Modules\WhatsApp\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class WhatsAppDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('whatsapps')->insert(
            [
                'phone' => '09191305357',
                'text' => 'سلام پیمان',
            ]
        );

        DB::table('whatsapps')->insert(
            [
                'phone' => '09120153112',
                'text' => 'سلام ممد',
            ]
        );

        DB::table('whatsapps')->insert(
            [
                'phone' => '09380379946',
                'text' => 'سلام آرین',
            ]
        );
    }
}
