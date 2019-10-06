import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
            vvipItem: {
                qty: "50",
                price: "100.000"
            },
            vipItem: {
                qty: "100",
                price: "75.000"
            },
            regulerItem: {
                qty: "600",
                price: "50.000"
            }
    },
    getters: {
        //  
    },
    mutations: {
        // 
    }
})