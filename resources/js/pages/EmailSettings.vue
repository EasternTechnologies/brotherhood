<template>
  <section class="section dashboard">
    <header class="section-header">
      <h2 class="section-header__title dashboard__title">Настройки почты</h2>
    </header>
    <div class="section-body dashboard__body">
      <table>
        <thead>
          <tr>
            <th>Почта отправителя</th>
            <th>Пароль отправителя</th>
            <th>Почта получателя</th>
          </tr>
        </thead>
          <tbody>
          <tr>
            <td>
              <label>
                <input v-model="MAIL_USERNAME" type="text">
              </label>
            </td>
            <td>
              <label>
                <input v-model="MAIL_PASSWORD" type="text">
              </label>
            </td>
            <td>
              <label>
                <input v-model="MAIL_ADMIN" type="text">
              </label>
            </td>
          </tr>
          </tbody>
        </table>
    </div>

    <br>

    <div>
      <router-link tag="button" title="Назад" :to="{name: 'control'}">
        <div>Назад</div>
      </router-link>

      <button @click="updateMailSettings">Сохранить</button>
    </div>
  </section>
</template>

<script>
import axios from 'axios'

  export default {
    data () {
      return {
        MAIL_USERNAME: '',
        MAIL_PASSWORD: '',
        MAIL_ADMIN: '',
      }
    },
    beforeMount () {
      this.updateMailSettings()
    },
    methods: {
      updateMailSettings () {
        axios.get("/admin/settings/mail",
          { params: {
              MAIL_USERNAME: this.MAIL_USERNAME,
              MAIL_PASSWORD: this.MAIL_PASSWORD,
              MAIL_ADMIN:    this.MAIL_ADMIN
          }}).then(response => {
          this.MAIL_USERNAME = response.data.MAIL_USERNAME,
          this.MAIL_PASSWORD = response.data.MAIL_PASSWORD,
          this.MAIL_ADMIN = response.data.MAIL_ADMIN
          })
      },
    },
  }
</script>

<style>
</style>