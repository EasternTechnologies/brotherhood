<template>
    <section class="section users">
        <header class="section-header">
            <h2 class="section-header__title dashboard__title">
                <span>Редактирование пользователя</span>
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
                            <div class="users__serch users-search">
                                <div class="user-search__block">
                                    <select name="category" v-model="selectedRole">
                                        <option v-for="role in roles" :key="role.id" :value="role.id">
                                            {{ role.name }}
                                        </option>
                                    </select>
                                </div>
                            </div>
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
            id: this.$route.params['id'],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            searchCountry: '',
            countries: [],
            selectedRole: '',
            roles: [],
            user: '',
            password: '',
            oldCountry: '',
        }
    },
    mounted() {
        this.getUser()
    },
    methods: {
        getUser () {
            axios.get('/admin/users/edit', {params: { id: this.id }}).then(response => {
                this.roles = response.data.role;
                this.user = response.data.user[0];
                this.selectedRole = this.user.rolesId;
                this.searchCountry = this.user.countryName;
                if (this.oldCountry === '') {
                    this.oldCountry = this.searchCountry
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
            if (this.oldCountry === this.searchCountry ) {
                this.oldCountry = ''
            }else{
                this.oldCountry = this.searchCountry
            }
            axios.post("/admin/user/update", {
                user: this.user,
                country: this.oldCountry,
                password: this.password,
                role: this.selectedRole 
            }).then(response => {
                console.log(response.data)
            })
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