export default module = {
    singularName: 'user',
    pluralName: 'users',
    singularPersianName: 'کاربر',
    pluralPersianName: 'کاربران',
    tableRows: {
        name: 'نام',
    },
    formfields: {
        name: {
            type: 'input',
            persianName: 'نام',
            col:6
        },
        phone: {
            type: 'input',
            persianName: 'تلفن ثابت',
            col:6
        },
        mobile: {
            type: 'input',
            persianName: 'موبایل',
            col:6
        },
        email: {
            type: 'input',
            persianName: 'ایمیل',
            input_type: 'email',
            col:6
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
            options: {
                0: 'مدیر',
                1: 'نویسنده',
                2: 'مشاور املاک',
            }            
        },
        password: {
            type: 'input',
            persianName: 'رمز عبور',
            input_type: 'password',
            col:6
        },
        password_confirmation: {
            type: 'input',
            persianName: 'رمز عبور',
            input_type: 'password',
            col:6
        },
        picture: {
            type: 'input',
            persianName: 'تصویر پروفایل',
            input_type: 'file',
            col: 6
        },
        
    }
}