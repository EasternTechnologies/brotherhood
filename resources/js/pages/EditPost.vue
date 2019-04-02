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
                        <th>Дата создания</th>
                        <th>Дата обновления</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <form class="search-form" autocomplete="off">
                                <p class="search-form__block">
                                    <label aria-label="Искать пользователя">
                                        <input class="" name="searchUser" type="search" placeholder="Поиск" v-model="searchUser" @keyup="searchWordUser">
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
                        <td v-model="post.created_at">{{post.created_at}}</td>
                        <td v-model="post.updated_at">{{post.updated_at}}</td>
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
                            <th v-if="isPublished === 1 ">Дата публикации</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><textarea v-model="post.text" name="text" cols="50" rows="10"></textarea>  </td>
                            <td>
                                <button v-if="isPublished === 1" @click="rePublish">Отправить на модерацию</button>
                                <button class="success" v-if="isPublished === 0 " @click="rePublish">Опубликовать</button>
                            </td>
                            <td v-if="isPublished === 1 " v-model="post.published_at">{{post.published_at}}</td>
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
            id: this.$route.params['id'],
            project: this.$route.params['project'],
            publish: this.$route.params['publish'],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            post: '',
            searchCountry: '',
            countries: [],
            searchUser: '',
            users: [],
            usersArray: [],
            userId: '',
            oldCountry: '',
            isPublished: '',
            urlPublish: '',
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
                this.isPublished = this.post.is_published;
                this.searchCountry = this.post.country.ru;
                this.searchUser = this.post.user.name;
                if (this.oldCountry === '') {
                    this.oldCountry = this.searchCountry
                }
            })
        },
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
                    this.userId = user.id
                }
            });
        },
        save() {
            if (this.oldCountry === this.searchCountry ) {
                this.oldCountry = ''
            }else{
                this.oldCountry = this.searchCountry
            }
            axios.post("/admin/projects/" + this.project + "/" + this.publish + "/updatePost",
                { params: {
                    id: this.id,
                    userId: this.userId,
                    country: this.oldCountry,
                    text: this.post.text
                } }).then(response => {
                if (response.statusText === 'OK') {
                    this.$router.push({name: 'editPost', params: {
                            project: this.project,
                            publish: this.publish,
                            id: this.id
                        }})
                }
            })
        },
        rePublish() {
            if (this.isPublished === 0 ) {
                this.isPublished = 1
            }else{
                this.isPublished = 0
            }
            if (this.publish === 'moderation' ) {
                this.urlPublish = 'materials'
            }else{
                this.urlPublish = 'moderation'
            }
            axios.get("/admin/projects/" + this.project + "/" + this.urlPublish + "/rePublish",
                { params: { id: this.id, is_published: this.isPublished } }).then(response => {
                if (response.statusText === 'OK') {
                    this.$router.push({name: 'editPost', params: {
                        project: this.project,
                        publish: this.urlPublish,
                        id: this.id
                    }})
                }
            })
        }
    },
    watch: {
        $route (toRoute, fromRoute) {
            this.project = toRoute.params['project'];
            this.publish = toRoute.params['publish'];
            this.id = toRoute.params['id'];
        }
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
