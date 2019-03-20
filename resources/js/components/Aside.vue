<template>
  <aside class="page-aside">
    <nav class="nav">
      <ul class="nav__list">
        <router-link class="nav__item" tag="li" to="/frontend/admin/dashboard" active-class="active">
          <a class="nav__link">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#panel"></use>
            </svg>
            <span class="nav__link-text">Панель</span>
          </a>
        </router-link>

        <router-link class="nav__item" tag="li" to="/frontend/admin/users" active-class="active">
          <a class="nav__link">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#users"></use>
            </svg>
            <span class="nav__link-text">Пользователи</span>
          </a>
        </router-link>

        <router-link class="nav__item" tag="li" to="/frontend/admin/backup" active-class="active">
          <a class="nav__link">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#backup"></use>
            </svg>
            <span class="nav__link-text">Бэкап</span>
          </a>
        </router-link>

        <router-link class="nav__item" tag="li" to="/frontend/admin/projects" active-class="active">
          <a class="nav__link submenu">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#projects"></use>
            </svg>
            <span class="nav__link-text">Проекты</span>
          </a>

          <ul class="nav__sublist">
            <li class="nav__subitem">
              <a class="nav__sublink submenu" href="#">Строители</a>

              <ul class="nav__sublist">
                <li class="nav__subitem">
                  <a class="nav__sublink" href="#">Модерация</a>
                </li>
                <li class="nav__subitem">
                  <a class="nav__sublink" href="#">Материалы</a>
                </li>
              </ul>
            </li>
          </ul>
        </router-link>

        <router-link class="nav__item" tag="li" to="/frontend/admin/control" active-class="active">
          <a class="nav__link">
            <svg class="nav__link-img" role="img" width="30px" height="30px">
              <use xlink:href="../../../public/img/svg/sprite.svg#control"></use>
            </svg>
            <span class="nav__link-text">Управление интерфейсом</span>
          </a>
        </router-link>

        <router-link class="nav__item" tag="li" to="/frontend/admin/email-settings" active-class="active">
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

  }

</script>
