const sidebar = [
    {
        type: 'div',
        id: 'estates',
        persianName: 'آگهی ها',
        children: [
            {
                link: '/estates/create',
                persianName: 'ایجاد آگهی',
                icon: 'plus-lg'
            },
            {
                link: '/estates',
                persianName: 'لیست آگهی ها',
                icon: 'list'
            },
            {
                permission: {
                    arg: 'excel',
                    value: 'estates'
                },
                link: '/estates/excel',
                persianName: 'اکسل آگهی ها'
            }
        ],
        icon: 'house'
    },
    {
        type: 'router-link',
        permission: {
            arg: 'index',
            value: 'terms'
        },
        link: '/terms',
        persianName: 'شرایط',
        icon: 'file'
    },
    {
        type: 'router-link',
        permission: {
            arg: 'index',
            value: 'facilities'
        },
        link: '/facilities',
        persianName: 'امکانات',
        icon: 'building'
    },

    {
        type: 'router-link',
        permission: {
            arg: 'index',
            value: 'roles'
        },
        link: '/roles',
        persianName: 'نقش ها',
        icon: 'person-lines-fill'
    },
    {
        type: 'router-link',
        permission: {
            arg: 'index',
            value: 'users'
        },
        link: '/users',
        persianName: 'کاربران',
        icon: 'person'
    },
    {
        type: 'router-link',
        permission: {
            arg: 'index',
            value: 'chats'
        },
        link: '/chats',
        persianName: 'پیام ها',
        icon: 'chat'
    },
    {
        type: 'router-link',
        link: '/settings/1',
        permission: {
            arg: 'edit',
            value: 'settings'
        },
        persianName: 'تنظیمات',
        icon: 'gear'
    },
];

export default sidebar;