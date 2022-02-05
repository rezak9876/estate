<?php

namespace Modules\Term\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Modules\Term\Entities\Term;

class TermTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $terms = [
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
        foreach ($terms as $term) {
            DB::table('terms')->insert(
                [
                    'title' => $term,
                ]
            );
        }
        
    }
}
