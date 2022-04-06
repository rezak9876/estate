const sidebar = [
    {
        type: 'router-link',
        permission: {
            arg: 'index',
            value: 'terms'
        },
        link: '/terms',
        persianName: 'شرایط'
    },
    {
        type: 'router-link',
        permission: {
            arg: 'index',
            value: 'facilities'
        },
        link: '/facilities',
        persianName: 'امکانات'
    },
    {
        type: 'div',
        id: 'estates',
        persianName: 'آگهی ها',
        children: [
            {
                link: '/estates/create',
                persianName: 'ایجاد آگهی'
            },
            {
                link: '/estates',
                persianName: 'لیست آگهی ها'
            },
            {
                permission: {
                    arg: 'excel',
                    value: 'estates'
                },
                link: '/estates/excel',
                persianName: 'اکسل آگهی ها'
            }
        ]
    },
    {
        type: 'router-link',
        permission: {
            arg: 'index',
            value: 'roles'
        },
        link: '/roles',
        persianName: 'نقش ها'
    },
    {
        type: 'router-link',
        permission: {
            arg: 'index',
            value: 'users'
        },
        link: '/users',
        persianName: 'کاربران'
    },
    {
        type: 'router-link',
        link: '/chats',
        persianName: 'پیام ها'
    },
    {
        type: 'router-link',
        link: '/settings/1',
        permission: {
            arg: 'edit',
            value: 'settings'
        },
        persianName: 'تنظیمات'
    },
];

export default sidebar;