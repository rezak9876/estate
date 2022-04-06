import { createRouter, createWebHashHistory } from 'vue-router'

import EstateIndex from '../pages/Estate/Index.vue'
import EstateCreate from '../pages/Estate/Create'
import EstateUpdate from '../pages/Estate/Update'

import ChatIndex from '../pages/Chat/Index.vue'
import ChatCreate from '../pages/Chat/Create'
import ChatShow from '../pages/Chat/Show'

import HomeIndex from '../pages/user/Home/Index'

const routes = [

    { path: "/", name: 'home', component: HomeIndex },


    { path: "/estates", name: 'estates-index', component: EstateIndex },
    { path: "/estates/create", name: 'estates-create', component: EstateCreate },
    { path: "/estates/:id", name: 'estates-edit', component: EstateUpdate },


    { path: "/chats", name: 'chats-index', component: ChatIndex },
    { path: "/chats/create", name: 'chats-create', component: ChatCreate },
    { path: "/chats/:id", name: 'chats-show', component: ChatShow },


];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});




export default router;