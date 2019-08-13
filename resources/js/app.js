window.Vue = require('vue');

import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import VueQrCode from '@chenfengyuan/vue-qrcode'
import VueQrcodeReader from 'vue-qrcode-reader'
import axios from 'axios';
import router from './router'
import store from './store'

window.axios = axios.create()

Vue.component('root-app', require('./components/RootApp.vue').default)

Vue.use(VueQrCode)
Vue.use(VueQrcodeReader)
Vue.use(Vuetify,{
    iconfont: "md",
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