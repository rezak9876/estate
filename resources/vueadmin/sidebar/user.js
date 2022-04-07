const sidebar = [
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
            }
        ]
    },
    {
        type: 'router-link',
        link: '/chats',
        persianName: 'پیام ها'
    }
];

export default sidebar;
