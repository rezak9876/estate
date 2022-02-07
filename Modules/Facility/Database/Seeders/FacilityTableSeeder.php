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
            ['title'=>'آسانسور','type'=>0],
            ['title'=>'پارکینگ','type'=>0],
            ['title'=>'انباری','type'=>0],
            ['title'=>'لابی','type'=>0],
            ['title'=>'استخر','type'=>0],
            ['title'=>'سونا','type'=>0],
            ['title'=>'سالن ورزش','type'=>0],
            ['title'=>'نگهبان','type'=>0],
            ['title'=>'بالکن','type'=>0],
            ['title'=>'تهویه مطبوع','type'=>0],
            ['title'=>'سالن اجتماعات','type'=>0],
            ['title'=>'روف گاردن','type'=>0],
            ['title'=>'درب ریموت','type'=>0],
            ['title'=>'جکوزی','type'=>0],
            ['title'=>'آنتن مرکزی','type'=>0],
            ['title'=>'تعداد اتاق','type'=>1],
        ];
        foreach ($facilities as $facility) {
            DB::table('facilities')->insert(
                [
                    'title' => $facility['title'],
                    'type' => $facility['type'],
                ]
            );
        }
        
    }
}
