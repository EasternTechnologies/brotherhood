import VueRouter from 'vue-router'
import Users from './pages/Users'
import Dashboard from './pages/Dashboard'
import Backup from './pages/Backup'
import Projects from './pages/Projects'
import Control from './pages/Control'
import EmailSettings from './pages/EmailSettings'
import ProjectPost from './pages/ProjectPost'

export default new VueRouter ({
  mode: 'history',
  routes: [
    {
      path: '/admin/dashboard',
      name: 'dashboard',
      component: Dashboard
    },
    {
      path: '/admin/users',
      name: 'users',
      component: Users
    },
    {
      path: '/admin/backup',
      name: 'backup',
      component: Backup
    },
    {
      path: '/admin/projects',
      name: 'projects',
      component: Projects
    },
    {
      path: '/admin/control',
      name: 'control',
      component: Control
    },
    {
      path: '/admin/email-settings',
      name: 'emailSettings',
      component: EmailSettings
    },
    {
      path: '/admin/projects/:project+/:publish',
      name: 'projectModeration',
      component: ProjectPost
    }
  ]
})