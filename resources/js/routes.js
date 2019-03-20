import VueRouter from 'vue-router'
import Users from './pages/Users'
import Dashboard from './pages/Dashboard'

export default new VueRouter ({
  mode: 'history',
  routes: [
    {
      path: '/frontend/admin/dashboard',
      name: 'dashboard',
      component: Dashboard
    },
    {
      path: '/frontend/admin/users',
      name: 'users',
      component: Users
    }
  ]
})