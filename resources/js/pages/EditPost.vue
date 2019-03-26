<template>
    <section class="section users">
        <header class="section-header">
            <h2 class="section-header__title dashboard__title">
                <span>Редактирование сообщения</span>
            </h2>
        </header>
        <div class="section-body users__body">
            <div class="users__table users-table">
                <table>
                    <thead>
                    <tr>
                        <th>Пользователь</th>
                        <th>Страна</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <!--<form class="search-form" autocomplete="off">-->
                                <!--<p class="search-form__block">-->
                                    <!--<label aria-label="Искать на странице">-->
                                        <!--<input class="" name="search" type="search" placeholder="Поиск" v-model="searchUser" @keyup="searchWordUser">-->
                                        <!--<input type="hidden" name="_token" :value="csrf">-->
                                    <!--</label>-->

                                <!--</p>-->
                                <!--<ul class="search-form__result-list">-->
                                    <!--<li class="search-form__result-item" v-for="user in users" :key="user.id" @click="selectUser($event)">{{user}}</li>-->
                                <!--</ul>-->
                            <!--</form>-->
                        </td>
                        <td>
                            <form class="search-form" autocomplete="off">
                                <p class="search-form__block">
                                    <label aria-label="Искать на странице">
                                        <input class="" name="search" type="search" placeholder="Поиск" v-model="searchCountry" @keyup="searchWord">
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
                <div>
                    <textarea v-model="post.text" name="text" cols="50" rows="10"></textarea>
                </div>
            </div>

        </div>
    </section>
</template>

<script>
import axios from 'axios'

export default {
    props: [
        'id',
        'project',
        'publish',
    ],
    data() {
        return {
            post: '',
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            searchCountry: '',
            countries: [],
            searchUser: '',
            users: [],
        }
    },
    mounted() {
        this.getPost()
    },
    methods: {
        getPost() {
            axios.get("/admin/projects/" + this.project + "/" + this.publish + "/editPost",
                { params: { id: this.id, country: this.searchCountry } }).then(response => {
                this.post = response.data;
            })
        },
        searchWord() {
            this.countries = [];
            axios.post("/admin/projects/" + this.project + "/" + this.publish + "/searchCountry",
                { params: { search: this.searchCountry } }).then(response => {
                this.countries = response.data;
            })
        },
        selectCountry(event) {
            this.searchCountry = event.target.innerHTML;
            this.countries = [];
        },
    },
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
