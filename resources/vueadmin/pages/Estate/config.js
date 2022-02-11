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
            }
        },
        map: {
            type: 'map',
            persianName: 'نقشه',
            col: 6,
        }
    }
}