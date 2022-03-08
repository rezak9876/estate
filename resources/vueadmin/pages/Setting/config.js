export default module = {
    singularName: 'setting',
    pluralName: 'settings',
    singularPersianName: 'تنظیم',
    pluralPersianName: 'تنظیمات',
    formfields: {
        
        maintenance: {
            type: 'radio',
            persianName: 'حالت تعمیر',
            col: 12,
            options: {
                0 : 'غیر فعال',
                1 : 'فعال',
            }
        },
        title: {
            type: 'input',
            persianName: 'عنوان',
            col:6
        },
        themColor: {
            type: 'input',
            persianName: 'رنگ تم',
            input_type: 'color',
            col: 6
        },
        meta_description: {
            type: 'textarea',
            persianName: 'توضیحات متا',
            col: 12
        },

        
        logo: {
            type: 'input',
            persianName: 'تصویر لوگو',
            input_type: 'file',
            accept:"image/*",
            col: 6
        },
        
        delete_logo: {
            type: 'picture',
            persianName: 'تصویر لوگو',
            col: 12
        },
        
        faIco: {
            type: 'input',
            persianName: 'تصویر آیکون',
            input_type: 'file',
            accept:"image/*",
            col: 6
        },

        
        delete_faIco: {
            type: 'picture',
            persianName: 'تصویر آیکون',
            col: 12
        },
        
        watermark: {
            type: 'input',
            persianName: 'تصویر واترمارک',
            input_type: 'file',
            accept:"image/*",
            col: 6
        },

         
        delete_watermark: {
            type: 'picture',
            persianName: 'تصویر واترمارک',
            col: 12
        },

        watermarkActive: {
            type: 'radio',
            persianName: 'وضعیت واترمارک',
            col: 6,
            options: {
                0 : 'غیر فعال',
                1 : 'فعال',
            }
        },
        
        watermarkPosition: {
            type: 'radio',
            persianName: 'موقعیت مکانی واترمارک',
            col: 6,
            options: {
                "top-right" : 'بالا راست',
                "top-left" : 'بالا چپ',
                "bottom-right" : 'پایین راست',
                "bottom-left" : 'پایین چپ',
                "center" : 'وسط',
            }
        },

        description: {
            type: 'textarea',
            persianName: 'توضیحات',
            col: 12
        },

        enamad: {
            type: 'textarea',
            persianName: 'ای نماد',
            col: 12
        },

        socialTelegram: {
            type: 'input',
            persianName: 'تلگرام',
            col: 6
        },

        socialInstagram: {
            type: 'input',
            persianName: 'اینستاگرام',
            col: 6
        },

        socialFacebook: {
            type: 'input',
            persianName: 'فیس بوک',
            col: 6
        },

        socialTwitter: {
            type: 'input',
            persianName: 'توییتر',
            col: 6
        },

        socialYoutube: {
            type: 'input',
            persianName: 'یوتیوب',
            col: 6
        },

        socialWhatsapp: {
            type: 'input',
            persianName: 'واتساپ',
            col: 6
        },

        // socialAparat: {
        //     type: 'input',
        //     persianName: 'آپارات',
        //     col: 6
        // },

         
        main_page_pic: {
            type: 'input',
            persianName: 'تصویر صفحه اصلی',
            input_type: 'file',
            accept:"image/*",
            col: 6
        },
           
        delete_main_page_pic: {
            type: 'picture',
            persianName: 'تصویر صفحه اصلی',
            col: 12
        },

        search_page_pic: {
            type: 'input',
            persianName: 'تصویر صفحه جست و جو',
            input_type: 'file',
            accept:"image/*",
            col: 6
        },
           
        delete_search_page_pic: {
            type: 'picture',
            persianName: 'تصویر صفحه جست و جو',
            col: 12
        },

        email: {
            type: 'input',
            persianName: 'ایمیل',
            input_type: 'email',
            col:4
        },
        
        email2: {
            type: 'input',
            persianName: '2ایمیل',
            input_type: 'email',
            col:4
        },
        
        email3: {
            type: 'input',
            persianName: '3ایمیل',
            input_type: 'email',
            col:4
        },

        mobile: {
            type: 'input',
            persianName: 'موبایل',
            col:4
        },
        
        mobile2: {
            type: 'input',
            persianName: '2موبایل',
            col:4
        },
        
        mobile3: {
            type: 'input',
            persianName: '3موبایل',
            col:4
        },

        phone: {
            type: 'input',
            persianName: 'تلفن',
            col:4
        },
        
        phone2: {
            type: 'input',
            persianName: '2تلفن',
            col:4
        },
        
        phone3: {
            type: 'input',
            persianName: '3تلفن',
            col:4
        },

        fax: {
            type: 'input',
            persianName: 'فکس',
            col:4
        },
        
        fax2: {
            type: 'input',
            persianName: '2فکس',
            col:4
        },
        
        fax3: {
            type: 'input',
            persianName: '3فکس',
            col:4
        },

        address: {
            type: 'textarea',
            persianName: 'آدرس',
            col:4
        },
        
        address2: {
            type: 'textarea',
            persianName: '2آدرس',
            col:4
        },
        
        address3: {
            type: 'textarea',
            persianName: '3آدرس',
            col:4
        },

        mobileWhatsup: {
            type: 'input',
            persianName: 'موبایل واتس آپ',
            col:6
        },

        mobileWhatsupStatus: {
            type: 'radio',
            persianName: 'وضعیت واتساپ',
            col: 6,
            options: {
                0 : 'غیر فعال',
                1 : 'فعال',
            }
        },

          
        mapGoogle: {
            type: 'textarea',
            persianName: 'کد گوگل مپ',
            col:12
        },
      
    },
    redirect : false
}