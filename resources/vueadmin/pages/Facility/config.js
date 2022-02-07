export default module = {
    singularName: 'facility',
    pluralName: 'facilities',
    singularPersianName: 'امکان',
    pluralPersianName: 'امکانات',
    tableRows: {
        title: 'عنوان',
        type: 'نوع',
    },
    formfields: {
        title: {
            type: 'input',
            persianName: 'عنوان',
            col:6
        },
        type: {
            type: 'select',
            persianName: 'نوع',
            col:6,
            options: {
                0: 'چک باکس',
                1: 'مقداری',
                2: 'متنی',
            }
        }
    }
}