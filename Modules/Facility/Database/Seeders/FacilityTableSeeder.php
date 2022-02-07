<?php

namespace Modules\Facility\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Facility\Entities\Facility;

class FacilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $facilities = [
            'پیش فروش',
            'مشارکتی',
            'معاوضه',
            'قابل تبدیل',
            'موقعیت اداری',
            'وام‌دار',
            'قیمت توافقی',
            'قدرالسهم',
            'پاساژ',
            'مال',
        ];
        foreach ($facilities as $facility) {
            DB::table('facilities')->insert(
                [
                    'title' => $facility,
                ]
            );
        }
        
    }
}
