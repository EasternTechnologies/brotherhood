<template>
    <section class="section users">
        <header class="section-header">
            <h2 class="section-header__title dashboard__title">
                <span>Создание нового сообшения</span>
            </h2>
            <form class="search-form" autocomplete="off">
                <p class="search-form__block">
                    <label aria-label="Искать на странице">
                        <input class="" name="search" type="search" placeholder="Поиск по странам" v-model="search" @keyup="searchWord">
                        <input type="hidden" name="_token" :value="csrf">
                    </label>

                </p>
                <ul class="search-form__result-list">
                    <li class="search-form__result-item" v-for="country in countries" :key="country.id" @click="selectCountry($event)">{{country}}</li>
                </ul>
            </form>
        </header>
        <div class="section-body users__body">
            <div class="users__table users-table">
                <table>
                    <thead>
                    <tr>
                        <th>Текст</th>
                        <th>Страна</th>
                        <th>Дата создания</th>
                        <th>Дата редактирования</th>
                        <th>
                            <router-link tag="button" title="Редактирование сообщения" :to="{name: 'newPost', params: {project: project, publish: publish }}">
                                Создать новое сообщенией
                            </router-link>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="post in posts" :key="post.id">
                        <td :value="post.text">{{ post.text }}</td>
                        <td :value="post.ru">{{ post.ru }}</td>
                        <td :value="post.created_at">{{ post.created_at }}</td>
                        <td :value="post.updated_at">{{ post.updated_at }}</td>
                        <td class="users-table__controls table-controls">
                            <ul class="table-controls__list">
                                <li class="table-controls__item">
                                    <router-link tag="button" title="Редактирование сообщения" :to="{name: 'editPost', params: {project: project, publish: publish, id: post.id }}">
                                        <svg class="table-controls__item-img" role="img" width="20px" height="20px">
                                            <use xlink:href="../../../public/img/svg/sprite.svg#user-settings"></use>
                                        </svg>
                                    </router-link>
                                </li>

                            </ul>
                            <button @click="setPosId(post.id)">Удалить Сообщение</button>
                            <div v-if="showModal">
                                <app-deleteModal
                                        @close="showModal = false"
                                        @deletePost="deletePost(deletePostId)"
                                ></app-deleteModal>
                            </div>
                            <button class="success" v-if="post.is_published === 0" @click="rePublish(post.id)">Опубликовать</button>
                        </td>

                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="user__pagination pagination">
                <button class="btn pagination__btn pagination__btn--prev" @click="fetchPaginateUsers(pagination.prev_page_url)"
                        :disabled="!pagination.prev_page_url">
                    Previos
                </button>
                <span class="pagination__info">Page {{pagination.current_page}} of {{pagination.last_page}}</span>
                <button class="btn pagination__btn pagination__btn--next" @click="fetchPaginateUsers(pagination.next_page_url)"
                        :disabled="!pagination.next_page_url">
                    Next
                </button>
            </div>
        </div>
    </section>
</template>

<script>
import axios from 'axios'
import {eventEmitter} from '../admin'

export default {
    data() {
        return {
            project: this.$route.params['project'],
            publish: this.$route.params['publish'],
            posts: [],
            pagination: [],
            url: '',
            search: '',
            countries: [],
            csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            editUrl: '',
            showModal: false,
            deletePostId: '',
        }
    },
    mounted() {
        this.url = "/admin/projects/" + this.project + "/" + this.publish + "/posts";
        this.getAllPosts()
    },
    methods: {
        searchWord() {
            this.countries = [];
            axios.post("/admin/projects/" + this.project + "/" + this.publish + "/searchCountry",
                { params: { search: this.search } }).then(response => {
                this.countries = response.data;
            })
        },
        selectCountry(event) {
            this.search = event.target.innerHTML;
            this.countries = [];
            this.getAllPosts();
        },
        getAllPosts() {
            let $this = this;
            this.editUrl = "/admin/projects/" + this.project + "/" + this.publish + "/editPost";
            axios.get( this.url,
                { params: { publish: this.publish, project: this.project, country: this.search } }).then(response => {
                this.posts = response.data.data;
                $this.makePagination(response.data);
            })
        },
        makePagination(data) {
            let pagination = {
                current_page: data.current_page,
                last_page:  data.last_page,
                next_page_url: data.next_page_url,
                prev_page_url: data.prev_page_url
            };
            this.pagination = pagination
        },
        fetchPaginateUsers(url) {
            this.url = url;
            this.getAllPosts()
        },
        deletePost(deletePostId) {
            this.showModal = false;
            axios.get("/admin/projects/" + this.project + "/" + this.publish + "/deletePost",
                { params: { id: deletePostId } }).then(response => {
                if (response.data === 'success') {
                    this.getAllPosts()
                }
            })
        },
        setPosId(PostId) {
            this.showModal = true;
            this.deletePostId = PostId
        },
        rePublish(postId) {
            axios.get("/admin/projects/" + this.project + "/" + this.publish + "/rePublish",
                { params: { id: postId, is_published: 1 } }).then(response => {
                if (response.statusText === 'OK') {
                    this.getAllPosts()
                }
            })
        }
    },
    watch: {
        $route (toRoute) {
            this.project = toRoute.params['project'];
            this.publish = toRoute.params['publish']
        }
    },
    created() {
        eventEmitter.$on('updateData', () => {
            this.getAllPosts()
        })
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
        margin-top: 20px;
    }
</style>