<?php

namespace Modules\Setting\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory;

    CONST PATH_UPLOAD = 'images/setting/';
    protected $fillable = ['title','meta_description',
        'description','description_en','noticeBannerTopImage','noticeBannerTopText',
        'noticeBannerTopLink','noticeBannerTopStatus','noticeBannerTopColor',
        'mobile','email','phone','address','officeHours','themColor','tax','phoneHeader','descriptionFooter',
        'email2','email3','fax','fax2','fax3',  'address2','address3','phone2','phone3','mobile2','mobile3',
        'province_id','transferFreeActive_OrderPrice','maintenance','shopping',
        'transferFree_OrderPrice','logo','watermark','watermarkActive','watermarkPosition',
        'socialTelegram','socialInstagram','socialFacebook','socialTwitter','socialYoutube','socialWhatsapp','socialAparat','enamad',
        'payOnline','cartTocart','payCartNumber','payMobile','payDescription',
        'mobileWhatsup','mobileWhatsupStatus','mapGoogle','mapGoogleApi','samandehiCode',
        'main_page_pic','search_page_pic'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Setting\Database\factories\SettingFactory::new();
    }
}
