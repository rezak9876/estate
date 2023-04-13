import * as $ from "jquery";
export default module = {
    singularName: 'estate',
    pluralName: 'estates',
    singularPersianName: 'آگهی',
    pluralPersianName: 'آگهی ها',
    tableRows: [{
        type: 'text',
        title: 'عنوان',
        slug: 'title',
    },
    {
        type: 'text',
        title: 'نوع',
        slug: 'type',
    },
    {
        type: 'text',
        title: 'وضعیت',
        slug: 'status',
    },
    {
        type: 'button',
        title: 'ویرایش',
        slug: 'edit',
        style: {
            width: '10%'
        }
    },
    {
        type: 'button',
        title: 'حذف',
        slug: 'delete',
        style: {
            width: '10%'
        }
    }
    ],
    formfields: {
        type: {
            type: 'select',
            persianName: 'نوع',
            col: 6,
            options: {},
            events: {
                change: function (e) {
                    change_form(e.target.value)

                    function hide(type) {
                        var buy_sell = $(`input[data-group='${type}']`);
                        buy_sell.prop("disabled", true);
                        buy_sell.parent().parent().parent().addClass("d-none");
                    }

                    function show(type) {
                        var buy_sell = $(`input[data-group='${type}']`);
                        buy_sell.prop("disabled", false);
                        buy_sell.parent().parent().parent().removeClass("d-none");
                    }

                    function change_form(type) {
                        if (type == 1) {
                            show(1);
                            hide(0);
                        } else {
                            show(0);
                            hide(1);
                        }
                    }
                }
            }
        },

        use_type_property_id: {
            type: 'select',
            persianName: 'نوع ملک',
            col: 6,
            optgroups: {}
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
            placeholder: '1399',
            col: 6
        },
        total_price: {
            type: 'input',
            persianName: 'قیمت',
            input_type: 'number',
            thousands_group: true,
            data_group: 0,
            col: 6
        },

        mortgage_price: {
            type: 'input',
            persianName: 'قیمت رهن',
            input_type: 'number',
            thousands_group: true,
            data_group: 1,
            col: 6
        },

        rent_price: {
            type: 'input',
            persianName: 'قیمت اجاره',
            input_type: 'number',
            thousands_group: true,
            data_group: 1,
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
            accept: "image/*",
            col: 6,
            span: {
                text: 'تصویر اصلی باید حداکثر 5 مگابایت باشد.'
            }
        },

        delete_main_picture: {
            type: 'picture',
            persianName: 'تصویر اصلی',
            col: 12
        },


        galleries: {
            type: 'input',
            persianName: 'گالری تصاویر',
            input_type: 'file',
            accept: "image/*",
            col: 6,
            attributes: {
                multiple: true
            },
            span: {
                text: 'تصاویر گالری باید حداکثر 5 مگابایت باشند.'
            }
        },


        delete_galleries: {
            type: 'galleries',
            persianName: 'گالری',
            col: 12
        },

        terms: {
            type: 'multiple_checkboxes',
            persianName: 'شرایط',
            col: 6,
            children: {}
        },

        bool_facilities: {
            type: 'multiple_checkboxes',
            persianName: 'امکانات',
            col: 6,
            children: {}
        },


        map: {
            type: 'map',
            persianName: 'نقشه',
            col: 12,
        },


        status: {
            type: 'select',
            persianName: 'وضعیت',
            col: 6,
            options: {
                'not_approved': 'غیرفعال',
                'approved': 'فعال',
                'pending_approval': 'در انتظار تایید',
                'archived': 'آرشیو',
            },
            permission: {
                arg: 'verification',
                value: 'estates'
            },
        },
    },
    // events: {
    //     mounted:
    //         function () {
    //             alert('jijisf')
    //         }

    // }
}