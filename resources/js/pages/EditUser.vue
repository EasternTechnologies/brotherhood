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
                    </tr>
                    </tbody>
                </table>

                <br>


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
        }
    },
    mounted() {
        this.getUser()
    },
    methods: {
        getUser () {
            axios.get('/admin/users/edit', {params: { id: this.id }}).then(response => {
                console.log(response.data)
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
</style>