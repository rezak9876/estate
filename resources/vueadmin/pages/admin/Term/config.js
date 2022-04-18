export default module = {
    singularName: 'term',
    pluralName: 'terms',
    singularPersianName: 'شرط',
    pluralPersianName: 'شرایط',
    tableRows: [
        {
            type: 'text',
            title: 'عنوان',
            slug: 'title',
        },
        {
            type: 'button',
            title: 'ویرایش',
            slug: 'edit',
            permission: {
                arg: 'edit',
                value: 'terms'
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
                value: 'terms'
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
        }
    }
}