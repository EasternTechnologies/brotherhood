// window.Vue = require('vue');
import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import router from './routes'

Vue.use(VueRouter)

Vue.component('app-header', require('./components/Header.vue').default);
Vue.component('app-footer', require('./components/Footer.vue').default);
Vue.component('app-aside', require('./components/Aside.vue').default);

new Vue({
    el: '#admin',
    render: h => h(App),
    router
});
