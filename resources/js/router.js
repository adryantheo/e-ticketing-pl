import Vue from 'vue'
import VueRouter from 'vue-router';

import RootApp from './components/RootApp.vue'

Vue.use(VueRouter)

const routes = [
    {path: '/', component: RootApp,
        children: [
        ]
},

]


const router = new VueRouter({
    routes,
    hashbang: false,
    mode: 'history',
})

export default router;