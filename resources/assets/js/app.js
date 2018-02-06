
require('./bootstrap');

window.Vue = require('vue');

import Select2 from 'Select2';

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

let Appheader = require('./components/Appheader.vue');
let Appfooter = require('./components/Appfooter.vue');
let Student = require('./components/Student.vue');
let Course = require('./components/Course.vue');

const routes = [
  { path: '/student', component: Student },
  { path: '/course', component: Course }
]

const router = new VueRouter({
  routes // short for `routes: routes`
})

const app = new Vue({
    el: '#app',
    router,
    components: { Appheader, Appfooter }
});
