// window.Vue = require('vue');
import Vue from 'vue'
import VueRouter from 'vue-router'
import router from './routes'

Vue.use(VueRouter)


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Vue.component('join-autocomplete', require('./components/JoinAutocomplete.vue').default);

new Vue({
    el: '#admin',
    router
});
