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
                            <form class="search-form" autocomplete="off">
                                <p class="search-form__block">
                                    <label aria-label="Искать пользователя">
                                        <input name="searchUser" type="search" placeholder="Поиск" v-model="searchUser" @keyup="searchWordUser">
                                        <input type="hidden" name="_token" :value="csrf">
                                    </label>

                                </p>
                                <ul class="search-form__result-list">
                                    <li class="search-form__result-item" v-for="user in users" :key="user.id" @click="selectUser($event)">{{user}}</li>
                                </ul>
                            </form>
                        </td>
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

                <div>
                    <table>
                        <thead>
                        <tr>
                            <th>Текст</th>
                            <th>Опубликован</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><textarea v-model="post.text" name="text" cols="50" rows="10"></textarea></td>
                            <td>
                                <div>
                                <label class="checkbox">
                                    <input type="checkbox" value="1" v-model="post.is_published">Опубликовать при сохранении
                                </label>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>
            <router-link tag="button" title="Назад" :to="{name: 'projectModeration', params: {project: project, publish: publish}}">
                <div>Назад</div>
            </router-link>

            <button @click="save">Сохранить</button>
        </div>
    </section>
</template>

<script>
import axios from 'axios'

export default {
    data() {
        return {
            project: this.$route.params['project'],
            publish: this.$route.params['publish'],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            post: [],
            searchCountry: '',
            countries: [],
            searchUser: '',
            users: [],
            usersArray: [],
            userId: '',
        }
    },
    methods: {
        searchWordCountry() {
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
        searchWordUser() {
            this.users = [];
            axios.post("/admin/projects/" + this.project + "/" + this.publish + "/searchUser",
                { params: { search: this.searchUser } }).then(response => {
                response.data.forEach((user) => {
                    this.users.push(user.name);
                });
                this.usersArray = response.data;
            })
        },
        selectUser(event) {
            this.searchUser = event.target.innerHTML;
            this.users = [];
            this.usersArray.forEach((user) => {
                if (this.searchUser === user.name) {
                    this.post.user_id = user.id
                }
            });
        },
        save() {
            if (this.post.is_published) {
                this.post.is_published = 1;
                this.publish = 'materials';
            }else{
                this.post.is_published = 0;
                this.publish = 'moderate';
            }
            axios.post("/admin/projects/" + this.project + "/" + this.publish + "/createNewPost",
                {
                    text: this.post.text,
                    user_id: this.post.user_id,
                    is_published: this.post.is_published,
                    country: this.searchCountry,
                    category: this.project,
                }).then(response => {
                if (response.data === 'success') {
                    this.$router.push({name: 'projectModeration', params: {
                            project: this.project,
                            publish: this.publish,
                    }})
                }
            })
        },
    },
    watch: {
        $route (toRoute, fromRoute) {
            this.project = toRoute.params['project'];
            this.publish = toRoute.params['publish'];
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

    .checkbox {
        position: relative;
    }

    .checkbox input {
        position: absolute;
        top: 0;
        left: 0;
    }
</style>
