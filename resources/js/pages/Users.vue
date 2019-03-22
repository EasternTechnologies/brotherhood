<template>
  <section class="section users">
    <header class="section-header">
      <h2 class="section-header__title dashboard__title">Пользователи</h2>

      <div class="users__serch users-search">
        <form class="users-search__form" @keydown.enter.prevent="">
          <div class="user-search__block">
            <input name="text" type="text" v-model="selectedSearch" @keyup="searchWithOption">
            <select name="category" v-model="selected">
              <option v-for="option in options" :value="option.value">
                {{ option.text }}
              </option>
            </select>
          </div>
        </form>
      </div>
    </header>
    <div class="section-body users__body">
      <div class="users__table users-table">
        <table>
          <thead>
            <tr>
              <th>Имя</th>
              <th>Email</th>
              <th>Страна</th>
              <th>Телефон</th>
              <th>Роль</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="user in users">
              <td :value="user.name">{{ user.name }}</td>
              <td :value="user.email"><a :href="'mailto:' + user.email">{{ user.email }}</a></td>
              <td :value="user.country">{{ user.country }}</td>
              <td :value="user.phone"><a :href="'tel:+' + user.phone">{{ user.phone }}</a></td>
              <td :value="user.roles">{{ user.roles }}</td>

              <td class="users-table__controls table-controls">
                <ul class="table-controls__list">
                  <li class="table-controls__item">
                    <button type="button" title="Удалить пользователя">
                      <svg class="table-controls__item-img" role="img" width="20px" height="20px">
                        <use xlink:href="../../../public/img/svg/sprite.svg#user-delete"></use>
                      </svg>
                    </button>
                  </li>
                  <li class="table-controls__item">
                    <button type="button" title="Блокировать пользователя">
                      <svg class="table-controls__item-img" role="img" width="20px" height="20px">
                        <use xlink:href="../../../public/img/svg/sprite.svg#user-block"></use>
                      </svg>
                    </button>
                  </li>
                  <li class="table-controls__item">
                    <button type="button" title="Настройки пользователя">
                      <svg class="table-controls__item-img" role="img" width="20px" height="20px">
                        <use xlink:href="../../../public/img/svg/sprite.svg#user-settings"></use>
                      </svg>
                    </button>
                  </li>
                </ul>
              </td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="users__new">
        <button class="users__new-btn btn" type="button" @click="getUsers">
          <svg role="img" width="20px" height="20px">
            <use xlink:href="../../../public/img/svg/sprite.svg#user-add"></use>
          </svg>
          <span>Создать пользователя</span>
        </button>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios'

  export default {
    data() {
      return {
        users: [],
        selectedSearch: '',
        selected: 'users.name',
        options: [
          { text: 'Поиск по пользователям', value: 'users.name' },
          { text: 'Поиск по email',         value: 'users.email' },
          { text: 'Поиск по странам',       value: 'countries.name' },
          { text: 'Поиск по телефону',      value: 'users.phone' }
        ]
      }
    },
    beforeMount() {
      this.getUsers()
    },
    methods: {
      getUsers() {
        axios.get('/admin/users/show', { params: { selected: this.selected,
                  selectedSearch: this.selectedSearch } }).then(response => {
          this.users = []
          for (var i = 0; i < response.data.length; i++) {
            this.users.push(response.data[i])
          }
        })
      },
      searchWithOption() {
          this.getUsers()
      }
    },
    // computed: {
    //   paintWord() {
    //     if (this.selectedSearch !== '') {
    //    // this.selectedSearch, this.selected
    //     $item = this.users.filter(name => {
    //
    //     })
    //
    //
    //     }
    //     return this.users
    //   }
    // }
  }

</script>
