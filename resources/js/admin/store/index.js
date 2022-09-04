import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios";

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        user: {}
    },
    getters: {
        authUser(state) {
            return state.user
        }
    },
    mutations: {},
    actions: {
        getAuthUser() {
            axios.get('/api/auth-user')
                .then(res => {

                })
        }
    }

})
