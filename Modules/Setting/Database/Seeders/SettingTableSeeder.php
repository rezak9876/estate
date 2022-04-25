<?php

namespace Modules\Setting\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('settings')->insert(
            [
                'title' => 'ایران هوس',
                'meta_description' => 'توضیحات متا',
                'themColor' => '#204abb',
                'logo' => '165054466231197.png',
                'faIco' => '16350921708165604.png',
                'watermark' => '16350921706587955.png',
                'watermarkActive' => '0',
                'watermarkPosition' => 'center',
                'description' => 'املاک پی کو
با چند کلیک ملک مورد نظر خود را پیدا کنید.',
                'enamad' => '<img src="https://webramz.com/wp-content/uploads/2018/10/000.jpg" alt="https://webramz.com/wp-content/uploads/2018/10/000.jpg" class="shrinkToFit" "="" style="width: 150px;height:150px;">',
                'socialTelegram' => 'https://www.telegram.com/',
                'socialInstagram' => 'https://www.instagram.com/',
                'socialFacebook' => 'https://www.facebook.com/',
                'socialTwitter' => 'https://www.twitter.com/',
                'socialYoutube' => 'https://www.youtube.com/',
                'socialWhatsapp' => 'https://www.whatsapp.com/',
                'socialAparat' => 'https://www.aparat.com/',
                'email' => 'vdwaer.karimi@tarhfa.com',
                'address' => 'تهران ، میدان آزادی',
                'mobile' => '09363389294',
                'phone' => '02155725610',
                'fax' => 'فکس 1',
                'mobileWhatsupStatus' => '0',
                'maintenance' => '0',
                'main_page_pic' => '16503105749385153.jpg',
                'search_page_pic' => '16503105742155688.jpg',
            ]
        );
    }
}
