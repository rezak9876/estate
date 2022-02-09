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
            col:6
        },
        slug: {
            type: 'input',
            persianName: 'اسلاگ',
            col:6
        },
        'permissions[]': {
            type: 'checkbox',
            persianName: 'دسترسی ها',
            col:6
        },
    }
}