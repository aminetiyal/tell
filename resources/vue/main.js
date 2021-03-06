require('./_includes/bootstrap');
require('./_includes/plugins');
require('./_includes/helpers');
require('./_includes/globalComponents');

import Vue from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'

/* Config */
Vue.config.productionTip = false

/* Global instance */
Vue.mixin({
    computed: {
        isAuth() {
            return this.$store.getters.isAuth;
        }
    }
})

/* App */
new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app')
