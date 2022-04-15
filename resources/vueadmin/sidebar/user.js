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
            }
        ],
        icon: 'house'
    },
    {
        type: 'router-link',
        link: '/chats',
        persianName: 'پیام ها',
        icon: 'chat'
    }
];

export default sidebar;
