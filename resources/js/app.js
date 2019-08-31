window.Vue = require('vue');

import 'font-awesome/css/font-awesome.min.css' 
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import VueQrCode from 'vue-qrcode-component'
import VueQrcodeReader from 'vue-qrcode-reader'
import VueSwal from 'vue-swal'
import axios from 'axios';
import router from './router'
import store from './store'

window.axios = axios.create()

Vue.component('root-app', require('./components/RootApp.vue').default)

Vue.use(VueQrCode)
Vue.use(VueQrcodeReader)
Vue.use(VueSwal)
Vue.use(Vuetify,{
    iconfont: 'fa4',
    theme: {
        primary: "#ff5722",
    }
})

import RootApp from './components/RootApp.vue'
const app = new Vue({
    el: '#app',
    router,
    store,
    component: [
        RootApp
    ]
});