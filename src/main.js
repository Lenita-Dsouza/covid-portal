// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import store from './store'
import axios from 'axios'
import auth from './auth'
//import '@/assets/css/tailwind.css'
//import "tailwindcss/tailwind.css"
require('./css/tailwind.css');
auth.AuthCheck();

Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  // data: { isloading: false },
  router,
  store,
  components: { App },
  template: '<App/>'
})
// let timeout = '';
// router.beforeEach((to, from, next) => {
//   clearInterval(timeout);
//   app.isloading = true;
//   next();
// });

// router.aftereEach((to, from, next) => {
//   setTimeout(() => {
//     app.isloading = false;
//   }, 1500);


// });
