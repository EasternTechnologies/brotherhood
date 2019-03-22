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

        <router-link class="nav__item" tag="li" to="/admin/backup" active-class="active">
          <a class="nav__link">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#backup"></use>
            </svg>
            <span class="nav__link-text">Бэкап</span>
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
            <li class="nav__subitem">
              <h4 class="nav__subtitle submenu" @click="visible = !visible">Строители</h4>

              <ul class="nav__sublist" v-show="visible">
                <router-link to="/admin/projects/builders/moderation" class="nav__subitem">
                  <a class="nav__sublink">Модерация</a>
                </router-link>
                <router-link to="/admin/projects/builders/materials" class="nav__subitem">
                  <a class="nav__sublink">Материалы</a>
                </router-link>
              </ul>

            </li>
          </ul>
        </li>

        <router-link class="nav__item" tag="li" to="/admin/control" active-class="active">
          <a class="nav__link">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#control"></use>
            </svg>
            <span class="nav__link-text">Управление интерфейсом</span>
          </a>
        </router-link>

        <router-link class="nav__item" tag="li" to="/admin/email-settings" active-class="active">
          <a class="nav__link">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#email-settings"></use>
            </svg>
            <span class="nav__link-text">Настройки почты</span>
          </a>
        </router-link>
      </ul>
    </nav>
  </aside>
</template>

<script>
  export default {
    data() {
      return {
        show: false,
        visible: false,
      }
    },
    methods: {
     
    }
  }

</script>
