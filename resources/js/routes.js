import VueRouter from 'vue-router'
import Users from './pages/Users'
import Dashboard from './pages/Dashboard'

export default new VueRouter ({
  // mode: 'history',
  routes: [
    {
      path: '',
      name: 'dashboard',
      component: Dashboard
    },
    {
      path: '/users',
      name: '',
      component: Users
    }
  ]
})