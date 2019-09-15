import Vue from 'vue'
import VueRouter from 'vue-router';

import Landing from './components/LandingPage.vue'
import Login from './components/login/LoginApp.vue'
import RegisterCustomer from './components/RegisterCustomer'
import RootApp from './components/RootApp.vue'
import RootSAdmin from './components/RootSAdmin'
import RootAdmin from './components/RootAdmin'
import NotFound from './components/NotFound'
import SAdminDashboard from './components/SuperAdmin/AdminDashboard'
import HomeSAdmin from './components/SuperAdmin/pages/HomeApp.vue'
import UserSAdmin from './components/SuperAdmin/pages/UserApp.vue'
import ticketSAdmin from './components/SuperAdmin/pages/TicketAdmin.vue'
import AdminDashboard from './components/Admin/AdminDashboard'
import HomeApp from './components/Admin/Pages/HomeApp.vue'
import ticketApp from './components/Admin/Pages/TicketConf.vue'
import UserApp from './components/Admin/Pages/UserApp.vue'
import RootScanner from './components/scanner/RootScanner.vue';
import RootCustomer from './components/RootCustomer'

Vue.use(VueRouter)

const routes = [
    {path: '*', component: NotFound},
    {path: '/login', component: Login},
    {path: '/register', component: RegisterCustomer},
    {path: '/', component: Landing},
    {path: '/superadmin', component: RootSAdmin,
        children: [
            {path: '/superadmin',component: SAdminDashboard,
                children: [
                    {path: '/superadmin', redirect: 'home'},
                    {path: 'home', component: HomeSAdmin},
                    {path: 'ticket', component: ticketSAdmin},
                    {path: 'user', component: UserSAdmin}
                ],
                meta: {requiresAuth:true}
            }
        ]
        },
        {path: '/admin', component: RootAdmin,
            children: [
                {path:'/admin', component: AdminDashboard,
                    children: [
                        {path: '/admin', redirect: 'home'},
                        {path: 'home',component: HomeApp },
                        {path: 'ticket',component: ticketApp },
                        {path: 'user', component: UserApp},
                ],
                meta: {requiresAuth:true, }
                    }
            ]
    },
    {path: '/scanner', component: RootScanner, 
        children: [
            //
            {path:'/scanner', component: RootScanner},
        ],
        meta: {requiresAuth: true}
    },
    {path: '/customer', component: RootCustomer,
        children:[
            {path: '/customer', redirect: 'tiket'},
            {path: 'tiket'},
            {path: 'payment'}
        ],
        meta: {requiresAuth:true}
    } 

]

const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history',
})

import User from './helper/User.js';

router.beforeEach(async (to, from, next) => {
    if(to.matched.some(route => route.meta.requiresAuth)) {
        if(!User.loggedIn()) {
            next({path: '/login', replace: true})
            return
        }
    }
    
    else if(to.path === "/login" || to.path === "/register") {
        if(User.loggedIn()) {
            if(User.Role == 1){
                next({path: '/superadmin', replace:true});
                return
            }
            if(User.Role == 2){
                next({path: '/admin', replace:true});
                return
            }
            else if(User.Role == 3){
                next({path: '/scanner', replace:true});
                return
            }
            else{
                next({path: '/customer', replace:true})
            }
        }
    }

    next();
})

export default router;