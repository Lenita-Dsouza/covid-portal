import Vue from 'vue'
import Router from 'vue-router'
import HelloWorld from '@/components/HelloWorld'
import login from '@/components/login'
import register from '@/components/register'
import tab1 from '@/components/tab1'

Vue.use(Router)

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
      component: tab1
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
