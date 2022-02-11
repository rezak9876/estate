<?php

namespace Modules\UseType\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UseTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usetypes = [
            'مسکونی',
            'اداری تجاری',
        ];
        foreach ($usetypes as $usetype) {
            DB::table('use_types')->insert(
                [
                    'title' => $usetype,
                ]
            );
        }
    }
}
