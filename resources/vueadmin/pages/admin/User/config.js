export default module = {
    singularName: 'user',
    pluralName: 'users',
    singularPersianName: 'کاربر',
    pluralPersianName: 'کاربران',
    tableRows:
        [
            {
                type: 'text',
                title: 'نام',
                slug: 'name',
            },
            {
                type: 'button',
                title: 'ویرایش',
                slug: 'edit',
                permission: {
                    arg: 'edit',
                    value: 'users'
                },
                style: {
                    width: '10%'
                }
            },
            {
                type: 'button',
                title: 'حذف',
                slug: 'delete',
                permission: {
                    arg: 'delete',
                    value: 'users'
                },
                style: {
                    width: '10%'
                }
            }
        ],
    formfields: {
        name: {
            type: 'input',
            persianName: 'نام',
            col: 6
        },
        phone: {
            type: 'input',
            persianName: 'تلفن ثابت',
            placeholder: '02144444444',
            col: 6
        },

        mobile: {
            type: 'input',
            persianName: 'موبایل',
            placeholder: '09121111111',
            col: 6
        },
        email: {
            type: 'input',
            persianName: 'ایمیل',
            input_type: 'email',
            placeholder: 'email@gmail.com',
            col: 6
        },
        description: {
            type: 'textarea',
            persianName: 'توضیحات',
            col: 6
        },
        role_id: {
            type: 'select',
            persianName: 'نقش',
            col: 6,
            options: {}
        },
        password: {
            type: 'input',
            persianName: 'رمز عبور',
            input_type: 'password',
            span: {
                text: 'رمز عبور باید شامل حداقل یک عدد و یک حرف انگلیسی باشد.'
            },
            col: 6
        },
        password_confirmation: {
            type: 'input',
            persianName: 'تکرار رمز عبور',
            input_type: 'password',
            col: 6
        },
        picture: {
            type: 'input',
            persianName: 'تصویر پروفایل',
            input_type: 'file',
            accept: "image/*",
            col: 6
        },
        delete_picture: {
            type: 'picture',
            persianName: 'تصویر اصلی',
            col: 12
        },
    },
    onUpdatedForm: function () {
        location.reload()
    }
}