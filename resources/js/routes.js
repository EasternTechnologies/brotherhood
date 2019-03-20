import VueRouter from 'vue-router'
import Users from './pages/Users'
import Dashboard from './pages/Dashboard'
import Backup from './pages/Backup'
import Projects from './pages/Projects'
import Control from './pages/Control'
import EmailSettings from './pages/EmailSettings'

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
    },
    {
      path: '/frontend/admin/backup',
      name: 'backup',
      component: Backup
    },
    {
      path: '/frontend/admin/projects',
      name: 'projects',
      component: Projects
    },
    {
      path: '/frontend/admin/control',
      name: 'control',
      component: Control
    },
    {
      path: '/frontend/admin/email-settings',
      name: 'emailSettings',
      component: EmailSettings
    },
  ]
})