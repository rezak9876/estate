export default module = {
    singularName: 'role',
    pluralName: 'roles',
    singularPersianName: 'نقش',
    pluralPersianName: 'نقش ها',
    tableRows:
        [
            {
                type: 'text',
                title: 'عنوان',
                slug: 'title',
            },
            {
                type: 'text',
                title: 'نام مستعار',
                slug: 'slug',
            },
            {
                type: 'button',
                title: 'ویرایش',
                slug: 'edit',
                permission: {
                    arg: 'edit',
                    value: 'roles'
                },
            },
            {
                type: 'button',
                title: 'حذف',
                slug: 'delete',
                permission: {
                    arg: 'delete',
                    value: 'roles'
                },
            }
        ],
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