export default module = {
    singularName: 'role',
    pluralName: 'roles',
    singularPersianName: 'نقش',
    pluralPersianName: 'نقش ها',
    tableRows: {
        title: 'عنوان',
        slug: 'انام مستعار',
    },
    formfields: {
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
        permissions: {
            type: 'checkboxgroup',
            persianName: 'دسترسی ها',
            col: 12,
            categories: []
        },
        // user_permission: {
        //     type: 'checkboxgroup',
        //     name: 'permissions',

        // },
        // term_permission: {
        //     type: 'checkboxgroup',
        //     name: 'terms',
        //     persianName: 'شرایط',
        //     col: 6,
        //     children: {
        //         '1': 'ایجاد شرط',
        //         '2': 'ویرایش شرط',
        //     }
        // },
    }
}