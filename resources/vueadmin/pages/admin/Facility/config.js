export default module = {
    singularName: 'facility',
    pluralName: 'facilities',
    singularPersianName: 'امکان',
    pluralPersianName: 'امکانات',
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
            type: 'button',
            title: 'ویرایش',
            slug: 'edit',
            permission: {
                arg: 'edit',
                value: 'facilities'
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
                value: 'facilities'
            },
            style: {
                width: '10%'
            }
        }
    ],
    formfields: {
        title: {
            type: 'input',
            persianName: 'عنوان',
            col: 6
        },
        type: {
            type: 'select',
            persianName: 'نوع',
            col: 6,
            options: {
                0: 'انتخابی',
                1: 'مقداری',
                2: 'متنی',
            }
        }
    }
}