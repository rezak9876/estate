import { createRouter, createWebHashHistory  } from 'vue-router'

import TermIndex from './pages/Term/Index.vue'
import TermCreate from './pages/Term/Create'
import TermUpdate from './pages/Term/Update'

import FacilityIndex from './pages/Facility/Index.vue'
import FacilityCreate from './pages/Facility/Create'
import FacilityUpdate from './pages/Facility/Update'
const routes = [

    { path: "/terms", name: 'terms', component: TermIndex },
    { path: "/terms/create", name: 'termsCreate', component: TermCreate },
    { path: "/terms/:id", name: 'termsUpdate', component: TermUpdate },

    { path: "/facilities", name: 'facilities', component: FacilityIndex },
    { path: "/facilities/create", name: 'facilitiesCreate', component: FacilityCreate },
    { path: "/facilities/:id", name: 'facilitiesUpdate', component: FacilityUpdate },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

export default router;