import Vue from 'vue'
import VueRouter from 'vue-router';

import NotFound from './components/NotFound'
import RootApp from './components/RootApp.vue'
import RootSAdmin from './components/RootSAdmin'
import SAdminDashboard from './components/SuperAdmin/AdminDashboard'
import HomeSAdmin from './components/SuperAdmin/pages/HomeApp.vue'
import Landing from './components/LandingPage.vue'
import Login from './components/login/LoginApp.vue'

Vue.use(VueRouter)

const routes = [
    {path: '*', component: NotFound},
    {path: '/', component: RootApp,
        children: [
            {path: "/", component: Landing}
        ]
    },
    {path: '/superadmin', component: RootSAdmin,
        children: [
            {path: '/superadmin',component: SAdminDashboard,
                children: [
                    {path: '/superadmin', redirect: 'home'},
                    {path: 'home', component: HomeSAdmin}
                ]
            }
        ]
} 

]


const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history',
})

export default router;