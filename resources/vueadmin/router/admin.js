import { createRouter, createWebHashHistory } from 'vue-router'

import TermIndex from '../pages/admin/Term/Index.vue'
import TermCreate from '../pages/admin/Term/Create'
import TermUpdate from '../pages/admin/Term/Update'

import FacilityIndex from '../pages/admin/Facility/Index.vue'
import FacilityCreate from '../pages/admin/Facility/Create'
import FacilityUpdate from '../pages/admin/Facility/Update'

import RoleIndex from '../pages/admin/Role/Index.vue'
import RoleCreate from '../pages/admin/Role/Create'
import RoleUpdate from '../pages/admin/Role/Update'

import EstateIndex from '../pages/Estate/Index.vue'
import EstateCreate from '../pages/Estate/Create'
import EstateUpdate from '../pages/Estate/Update'

import EstateExcel from '../pages/admin/Estate/Excel'

import UserIndex from '../pages/admin/User/Index.vue'
import UserCreate from '../pages/admin/User/Create'
import UserUpdate from '../pages/admin/User/Update'

import SettingIndex from '../pages/admin/Setting/Index.vue'
import SettingCreate from '../pages/admin/Setting/Create'
import SettingUpdate from '../pages/admin/Setting/Update'

import HomeIndex from '../pages/admin/Home/Index'



import ChatIndex from '../pages/Chat/Index.vue'
import ChatCreate from '../pages/Chat/Create'
import ChatShow from '../pages/Chat/Show'


import { check_permission } from '../permissions'
const routes = [

    { path: "/", name: 'home', component: HomeIndex },

    { path: "/terms", name: 'terms-index', component: TermIndex },
    { path: "/terms/create", name: 'terms-create', component: TermCreate },
    { path: "/terms/:id", name: 'terms-edit', component: TermUpdate },

    { path: "/facilities", name: 'facilities-index', component: FacilityIndex },
    { path: "/facilities/create", name: 'facilities-create', component: FacilityCreate },
    { path: "/facilities/:id", name: 'facilities-edit', component: FacilityUpdate },

    { path: "/roles", name: 'roles-index', component: RoleIndex },
    { path: "/roles/create", name: 'roles-create', component: RoleCreate },
    { path: "/roles/:id", name: 'roles-edit', component: RoleUpdate },

    { path: "/estates", name: 'estates-index', component: EstateIndex },
    { path: "/estates/create", name: 'estates-create', component: EstateCreate },
    { path: "/estates/:id", name: 'estates-edit', component: EstateUpdate },

    { path: "/estates/excel", name: 'estates-excel', component: EstateExcel },

    { path: "/users", name: 'users-index', component: UserIndex },
    { path: "/users/create", name: 'users-create', component: UserCreate },
    { path: "/users/:id", name: 'users-edit', component: UserUpdate },


    { path: "/settings", name: 'settings-index', component: SettingIndex },
    { path: "/settings/create", name: 'settings-create', component: SettingCreate },
    { path: "/settings/:id", name: 'settings-edit', component: SettingUpdate },


    { path: "/chats", name: 'chats-index', component: ChatIndex },
    { path: "/chats/create", name: 'chats-create', component: ChatCreate },
    { path: "/chats/:id", name: 'chats-show', component: ChatShow },


];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});


router.beforeEach((to, from, next) => {
    // ...
    // explicitly return false to cancel the navigation
    if (typeof to.name !== 'undefined') {

        const url_array = to.name.split("-", 2);


        const freeModules = ["estates", "chats"];


        if (freeModules.includes(url_array[0]))
            return next(true)

        const condition = check_permission(url_array[1], url_array[0])

        return next(condition)
    }
})


export default router;