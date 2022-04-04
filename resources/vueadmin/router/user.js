import { createRouter, createWebHashHistory } from 'vue-router'

import EstateIndex from '../pages/Estate/Index.vue'
import EstateCreate from '../pages/Estate/Create'
import EstateUpdate from '../pages/Estate/Update'

import HomeIndex from '../pages/user/Home/Index'

const routes = [

    { path: "/", name: 'home', component: HomeIndex },


    { path: "/estates", name: 'estates-index', component: EstateIndex },
    { path: "/estates/create", name: 'estates-create', component: EstateCreate },
    { path: "/estates/:id", name: 'estates-edit', component: EstateUpdate },


];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});




export default router;