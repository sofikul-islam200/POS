

require('./bootstrap');
window.Vue = require('vue');
import Vue from 'vue'
import VueRouter from 'vue-router'
import {routes} from "./routes"
import User from "./Helper/User.js"
// ES6 Modules or TypeScript
import Swal from 'sweetalert2'
import Notification from './Helper/Notification'
import izitoastcss from "../../node_modules/izitoast/dist/css/iziToast.css"
import izitoastjs from "../../node_modules/izitoast/dist/js/iziToast.min"

//=============emport izitoast===========
window.iziToast = izitoastjs
//=========import user class=================
window.User = User;
//=========sweet alert swal============
window.Swal = Swal

// ============toaster from sweet alert
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });
//=========import toaster==========
window.Toast = Toast
Vue.use(VueRouter)
const router = new VueRouter({
    routes,
    mode:'history' // short for `routes: routes`
})
// import notification class
window.Notification = Notification;





Vue.component('pagination', require('laravel-vue-pagination'));

const app = new Vue({
    router,
    el: '#app',
});
