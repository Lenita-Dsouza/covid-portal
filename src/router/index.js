import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import login from '@/components/login'
import register from '@/components/register'
import tab1 from '@/components/tab1'
import tab2 from '@/components/tab2'
import store from '@/store'
import baseApi from '@/baseApi'

Vue.use(Router)

const Middleware = () => {
  return async (to, from, next) => {
    const user = store.getters.GET_AUTH_USER;
    let myRole = user.role;
    const auth = store.getters.GET_AUTH;
    const isRequiredAuth = to.matched.some(r => r.meta.requiredAuth);
    const hasRoles = to.matched.some(r => r.meta.userRoles);
    if (isRequiredAuth && localStorage.getItem('token') === null) {
      return next('/login');
    }

    if (hasRoles) {
      let arrayRoles = to.meta.userRoles;
      if (auth === false) {
        const response = await baseApi().get('/user');
        if (!response.data.error) {
          store.dispatch('SET_AUTH_USER', response.data.user.user);
          store.dispatch('SET_TOKEN', response.data.user.token);
          store.dispatch('SET_AUTH', true);
          localStorage.setItem('token', response.data.user.token.value);
          myRole = response.data.user.user.role;
        }
      }
      if (arrayRoles.indexOf(parseInt(myRole)) === -1) {
        console.log('not allowed');
        return next(false);
      }
    }
    next();
  }
}


export default new Router({
  routes: [
    {
      path: '/',
      name: 'Helloworld',
      component: HelloWorld
    },
    {
      path: '/tab1',
      name: 'tab1',
      component: tab1,
      meta: {
        requiredAuth: true,
        userRoles: [0, 1, 2]
      },
      beforeEnter: Middleware()
    },
    {
      path: '/tab2',
      name: 'tab2',
      component: tab2,
      meta: {
        requiredAuth: true,
        userRoles: [0, 2, 3]
      },
      beforeEnter: Middleware()

    },
    {
      path: '/login',
      name: 'login',
      component: login
    },
    {
      path: '/register',
      name: 'register',
      component: register
    },
  ]
})
