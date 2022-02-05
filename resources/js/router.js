import { createRouter, createWebHashHistory  } from 'vue-router'

import TermIndex from './pages/Term/Index.vue'
import TermCreate from './pages/Term/Create'
import TermUpdate from './pages/Term/Update'
const routes = [

    { path: "/terms", name: 'terms', component: TermIndex },
    { path: "/terms/create", name: 'termsCreate', component: TermCreate },
    { path: "/terms/:id", name: 'termsUpdate', component: TermUpdate },
];

const router = createRouter({
    history: createWebHashHistory(),
    routes
});

export default router;