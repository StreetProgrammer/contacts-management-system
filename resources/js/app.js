require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let Cheader = require('./components/Cheader.vue');

let Home = require('./components/Home.vue');
let About = require('./components/About.vue');

let Add = require('./components/Add.vue');

const routes = [
  { path: '/', component: Home },
  { path: '/home', component: Home },
  { path: '/about', component: About }
]

const router = new VueRouter({
	// mode: 'history',
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    components:{Cheader, Add}
});
