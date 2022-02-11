<?php

namespace Modules\UseTypeProperty\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UseTypePropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usetypeproperties = [
            ['title' => 'آپارتمان/برج', 'use_type_id' => 1],
            ['title' => 'ویلایی/باغ و باغچه', 'use_type_id' => 1],
            ['title' => 'مستغلات', 'use_type_id' => 1],
            ['title' => 'زمین/کلنگی', 'use_type_id' => 1],
            ['title' => 'پنت هاوس', 'use_type_id' => 1],
            ['title' => 'سایر', 'use_type_id' => 1],
            ['title' => 'دفتر کار, اتاق اداری و مطب', 'use_type_id' => 2],
            ['title' => 'مغازه', 'use_type_id' => 2],
            ['title' => 'انبار, سوله, کارگاه و کارخانه', 'use_type_id' => 2],
            ['title' => 'کشاورزی', 'use_type_id' => 2],
            ['title' => 'مستغلات', 'use_type_id' => 2],
            ['title' => 'زمین/کلنگی', 'use_type_id' => 2],
            ['title' => 'سایر', 'use_type_id' => 2],
        ];
        foreach ($usetypeproperties as $usetypeproperty) {
            DB::table('use_type_properties')->insert(
                [
                    'title' => $usetypeproperty['title'],
                    'use_type_id' => $usetypeproperty['use_type_id'],
                ]
            );
        }
    }
}
