export default module = {
    singularName: 'estate',
    pluralName: 'estates',
    singularPersianName: 'آگهی',
    pluralPersianName: 'آگهی ها',
    tableRows: {
        title: 'عنوان',
        type: 'نوع',
    },
    formfields: {
        type: {
            type: 'select',
            persianName: 'نوع',
            col: 6,
            options: {
                0: 'خرید و فروش',
                1: 'رهن و اجاره',
                2: 'پیش فروش',
                3: 'معاوضه',
            },
            events: {
                click : function () {
                    alert('hi');
                }
            }
        },

        use_type_property_id: {
            type: 'select',
            persianName: 'نوع ملک',
            col: 6,
            optgroups: {
                maskooni: {
                    persianName: 'مسکونی',
                    options: {
                        1: "آپارتمان / برج",
                        2: "ویلایی / باغ و باغچه",
                        3: "مستغلات",
                        4: "زمین / کلنگی",
                        5: "پنت هاوس",
                        6: "سایر",
                    }
                },
                edaritejari: {
                    persianName: 'اداری تجاری',
                    options: {
                        7: "دفتر کار, اتاق اداری و مطب",
                        8: "مغازه",
                        9: "انبار, سوله, کارگاه و کارخانه",
                        10: "کشاورزی",
                        11: "مستغلات",
                        12: "زمین/کلنگی",
                        13: "سایر",
                    }
                }
            }
        },

        area: {
            type: 'input',
            persianName: 'متراژ',
            input_type: 'number',
            col: 6
        },
        year_of_construction: {
            type: 'input',
            persianName: 'سال ساخت',
            input_type: 'number',
            col: 6
        },
        total_price: {
            type: 'input',
            persianName: 'قیمت',
            input_type: 'number',
            col: 6
        },

        mortgage_price: {
            type: 'input',
            persianName: 'قیمت رهن',
            input_type: 'number',
            col: 6
        },

        rent_price: {
            type: 'input',
            persianName: 'قیمت اجاره',
            input_type: 'number',
            col: 6
        },


        title: {
            type: 'input',
            persianName: 'عنوان',
            col: 6
        },


        slug: {
            type: 'input',
            persianName: 'اسلاگ',
            col: 6
        },



        description: {
            type: 'textarea',
            persianName: 'توضیحات',
            col: 6
        },



        main_pic: {
            type: 'input',
            persianName: 'تصویر اصلی',
            input_type: 'file',
            col: 6
        },


        galleries: {
            type: 'input',
            persianName: 'گالری تصاویر',
            input_type: 'file',
            col: 6,
            attributes: {
                multiple: true
            }
        },

        terms: {
            type: 'multiple_checkboxes',
            persianName: 'شرایط',
            col: 6,
            children : {}
        },

        bool_facilities: {
            type: 'multiple_checkboxes',
            persianName: 'شرایط',
            col: 6,
            children : {}
        },

        
        map: {
            type: 'map',
            persianName: 'نقشه',
            col: 12,
        },


    }
}