import { createRouter, createWebHashHistory } from 'vue-router'

import TermIndex from '../pages/Term/Index.vue'
import TermCreate from '../pages/Term/Create'
import TermUpdate from '../pages/Term/Update'

import FacilityIndex from '../pages/Facility/Index.vue'
import FacilityCreate from '../pages/Facility/Create'
import FacilityUpdate from '../pages/Facility/Update'

import RoleIndex from '../pages/Role/Index.vue'
import RoleCreate from '../pages/Role/Create'
import RoleUpdate from '../pages/Role/Update'

import EstateIndex from '../pages/Estate/Index.vue'
import EstateCreate from '../pages/Estate/Create'
import EstateUpdate from '../pages/Estate/Update'

import UserIndex from '../pages/User/Index.vue'
import UserCreate from '../pages/User/Create'
import UserUpdate from '../pages/User/Update'

import SettingIndex from '../pages/Setting/Index.vue'
import SettingCreate from '../pages/Setting/Create'
import SettingUpdate from '../pages/Setting/Update'
const routes = [

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

    { path: "/users", name: 'users-index', component: UserIndex },
    { path: "/users/create", name: 'users-create', component: UserCreate },
    { path: "/users/:id", name: 'users-edit', component: UserUpdate },


    { path: "/settings", name: 'settings-index', component: SettingIndex },
    { path: "/settings/create", name: 'settings-create', component: SettingCreate },
    { path: "/settings/:id", name: 'settings-edit', component: SettingUpdate },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});


router.beforeEach((to, from, next) => {
    // ...
    // explicitly return false to cancel the navigation
    const url_array = to.name.split("-", 2);
    console.log(url_array[0]);
    console.log(url_array[1]);

    return next()
})


export default router;