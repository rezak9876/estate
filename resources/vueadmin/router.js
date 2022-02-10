import { createRouter, createWebHashHistory  } from 'vue-router'

import TermIndex from './pages/Term/Index.vue'
import TermCreate from './pages/Term/Create'
import TermUpdate from './pages/Term/Update'

import FacilityIndex from './pages/Facility/Index.vue'
import FacilityCreate from './pages/Facility/Create'
import FacilityUpdate from './pages/Facility/Update'

import RoleIndex from './pages/Role/Index.vue'
import RoleCreate from './pages/Role/Create'
import RoleUpdate from './pages/Role/Update'
const routes = [

    { path: "/terms", name: 'terms', component: TermIndex },
    { path: "/terms/create", name: 'termsCreate', component: TermCreate },
    { path: "/terms/:id", name: 'termsUpdate', component: TermUpdate },

    { path: "/facilities", name: 'facilities', component: FacilityIndex },
    { path: "/facilities/create", name: 'facilitiesCreate', component: FacilityCreate },
    { path: "/facilities/:id", name: 'facilitiesUpdate', component: FacilityUpdate },

    { path: "/roles", name: 'roles', component: RoleIndex },
    { path: "/roles/create", name: 'rolesCreate', component: RoleCreate },
    { path: "/roles/:id", name: 'rolesUpdate', component: RoleUpdate },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

export default router;