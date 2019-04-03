<template>
  <aside class="page-aside">
    <nav class="nav">
      <ul class="nav__list">
        <router-link class="nav__item" tag="li" to="/admin/dashboard" active-class="active">
          <a class="nav__link">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#panel"></use>
            </svg>
            <span class="nav__link-text">Панель</span>
          </a>
        </router-link>

        <router-link class="nav__item" tag="li" to="/admin/users" active-class="active">
          <a class="nav__link">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#users"></use>
            </svg>
            <span class="nav__link-text">Пользователи</span>
          </a>
        </router-link>

        <li class="nav__item">
          <h3 class="nav__link submenu" @click="show = !show">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#projects"></use>
            </svg>
            <span class="nav__link-text">Проекты</span>
          </h3>

          <ul class="nav__sublist" v-show="show">

              <app-asideLiProject  v-for="project in projects" :key="project.id" :project="project"></app-asideLiProject>

          </ul>
        </li>

        <li class="nav__item">
          <h3 class="nav__link submenu" @click="visible = !visible">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#control"></use>
            </svg>
            <span class="nav__link-text">Управление интерфейсом</span>
          </h3>
            <ul class="nav__sublist" v-show="visible">

              <router-link class="nav__item" tag="li" to="/admin/email-settings" active-class="active">
                <a class="nav__link">
                  <svg class="nav__link-img" role="img" width="30px" height="30px">
                    <use xlink:href="../../../public/img/svg/sprite.svg#email-settings"></use>
                  </svg>
                  <span class="nav__link-text">Настройки почты</span>
                </a>
              </router-link>

              <router-link class="nav__item" tag="li" to="/admin/backup" active-class="active">
                <a class="nav__link">
                  <svg class="nav__link-img" role="img" width="30px" height="30px">
                    <use xlink:href="../../../public/img/svg/sprite.svg#backup"></use>
                  </svg>
                  <span class="nav__link-text">Бэкап</span>
                </a>
              </router-link>

              <router-link class="nav__item" tag="li" to="/admin/messageOnEarth" active-class="active">
                <a class="nav__link">
                  <svg class="nav__link-img" role="img" width="30px" height="30px">
                    <use xlink:href="../../../public/img/svg/sprite.svg#projects"></use>
                  </svg>
                  <span class="nav__link-text">Сообщения на планете</span>
                </a>
              </router-link>

            </ul>
        </li>
      </ul>
    </nav>
  </aside>
</template>

<script>
  import axios from 'axios'

  export default {
    data() {
      return {
        projects: '',
        show: false,
        visible: false,
        url: '/admin/projects/project_slug',
      }
    },
    beforeMount() {
      this.getProjects()
    },
    methods: {
      getProjects() {
        axios.get( this.url ).then(response => {
         this.projects = response.data
        })
      },
    }
  }

</script>
