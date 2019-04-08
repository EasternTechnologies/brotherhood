<template>
    <section class="section users">
        <header class="section-header">
            <h2 class="section-header__title dashboard__title">
                <span v-if="id === ''">Создание нового пользователя</span>
                <span v-if="id !== ''">Редактирование пользователя</span>
                <div v-if="error !== ''">
                    <span style="background-color: red">Заполните поля</span>
                </div>
            </h2>
        </header>
        <div class="section-body users__body">
            <div class="users__table users-table">
                <table>
                    <thead>
                    <tr>
                        <th>Страна</th>
                        <th>Роль пользователя</th>
                        <th>Дата создания</th>
                        <th>Дата обновления</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <form class="search-form" autocomplete="off">
                                <p class="search-form__block">
                                    <label aria-label="Искать страну">
                                        <input class="" name="searchCountry" type="search" placeholder="Поиск" v-model="searchCountry" @keyup="searchWordCountry">
                                        <input type="hidden" name="_token" :value="csrf">
                                    </label>

                                </p>
                                <ul class="search-form__result-list">
                                    <li class="search-form__result-item" v-for="country in countries" :key="country.id" @click="selectCountry($event)">{{country}}</li>
                                </ul>
                            </form>
                        </td>
                        <td>
                            <label>
                                <input type="radio" value="2" v-model="roles">Admin
                            </label>
                            <br>
                            <label>
                                <input type="radio" value="1" v-model="roles">User
                            </label>
                            <br>
                            <label>
                                <input type="radio" value="3" v-model="roles">Moderator
                            </label>
                        </td>
                        <td>{{user.createdAt}}</td>
                        <td>{{user.updatedAt}}</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <table>
                    <thead>
                    <tr>
                        <th>Имя</th>
                        <th>Email</th>
                        <th>Пароль</th>
                        <th>Телефон</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <label>
                                <input v-model="user.name" type="text">
                            </label>
                        </td>
                        <td>
                            <label>
                                <input v-model="user.email" type="email">
                            </label>
                        </td>
                        <td>
                            <label>
                                <input v-model="password" type="text" placeholder="Новый пароль">
                            </label>
                            <br>
                            <label v-if="password !== ''">
                                <input v-model.lazy="acceptPassword" type="text" placeholder="Подтверждение пароля">
                                <span v-if="acceptPassword !== password && acceptPassword !== ''">Пароли не совпадают</span>
                            </label>
                        </td>
                        <td>
                            <label>
                                <input v-model.number="user.phone" type="number">
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div>
            <router-link tag="button" title="Назад" :to="{name: 'users'}">
                <div>Назад</div>
            </router-link>

            <button @click="save">Сохранить</button>
        </div>
    </section>
</template>

<script>
import axios from 'axios'

export default {
    data () {
        return {
            id: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            searchCountry: '',
            countries: [],
            roles: [],
            user: {
                name: '',
                email: '',
                phone: '',
                createdAt: '',
                updatedAt: '',
                password: ''
            },
            password: '',
            acceptPassword: '',
            error: '',
        }
    },
    beforeMount() {
        if (this.$route.params['id']) {
            this.id = this.$route.params['id']
        }
        this.getUser()
    },
    methods: {
        getUser () {
            axios.get('/admin/users/newOrEditUser', {params: { id: this.id }}).then(response => {
                if (response.data.user) {
                    this.user.name = response.data.user[0].name;
                    this.user.email = response.data.user[0].email;
                    this.user.phone = response.data.user[0].phone;
                    this.user.createdAt = response.data.user[0].createdAt;
                    this.user.updatedAt = response.data.user[0].updatedAt;
                    this.searchCountry = response.data.user[0].countryName;
                    this.roles = response.data.user[0].rolesId;
                }
            })
        },
        searchWordCountry() {
            this.countries = [];
            axios.post("/admin/projects/materials/builders/searchCountry",
                { params: { search: this.searchCountry } }).then(response => {
                this.countries = response.data;
            })
        },
        selectCountry(event) {
            this.searchCountry = event.target.innerHTML;
            this.countries = [];
        },
        save () {
            if (this.acceptPassword === this.password) {
                this.user.password = this.acceptPassword
            }
            if (this.id === '') {
                this.createUser()
            }
            if (this.error === '') {
                console.log(this.roles)
                axios.post("/admin/user/update", {
                    id: this.id,
                    user: this.user,
                    country: this.searchCountry,
                    role: this.roles
                }).then(response => {
                    this.$router.push({name: 'users'})
                })
            }
        },
        createUser () {
            if (
                this.user.name === '' ||
                this.user.email === '' ||
                this.roles === '' ||
                this.searchCountry === '' ||
                this.acceptPassword !== this.password
            ) {
                this.error = 'error'
            }else{
                this.error = ''
            }
        }
    }
}
</script>

<style scoped>
    .search-form {
        width: 100%;
    }

    .search-form__block {
        position: relative;
    }

    .search-form__block input {
        background: #c4c4c4;
    }

    .search-form__result-list {
        background: #c4c4c4;
        margin-top: 10px;
    }

    label {
        position: relative;
        width: 50px;
        height: 35px;
    }

    input {
        border: 1px solid black;
        height: 35px;
        width: 250px;

    }
</style>