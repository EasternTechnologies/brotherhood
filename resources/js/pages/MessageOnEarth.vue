<template>
    <section class="section dashboard">
        <header class="section-header">
            <h2 class="section-header__title dashboard__title">Сообщения на планете</h2>
        </header>
        <div class="section-body dashboard__body">
            <table>
                <thead>
                <tr>
                    <th>Текст сообщения</th>
                    <th>Координата 1</th>
                    <th>Координата 2</th>
                    <th>
                        <router-link tag="button" title="Назад" :to="{name: 'newCoordinate'}">
                            <div>Добавить новое сообщение</div>
                        </router-link>
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(message, index) in messages" :key="message.id">
                    <td :value="message.properties.place">
                        {{message.properties.place}}
                    </td>
                    <td :value="message.geometry.coordinates[0]">
                        {{message.geometry.coordinates[0]}}
                    </td>
                    <td :value="message.geometry.coordinates[1]">
                        {{message.geometry.coordinates[1]}}
                    </td>
                    <td>
                        <ul class="table-controls__list">
                            <li class="table-controls__item">
                                <button @click="setMessageId(index)">Удалить Сообщение</button>
                                <div v-if="showModal">
                                    <app-deleteModal
                                        @close="showModal = false"
                                        @deletePost="deleteMessage(deleteMessageId)"
                                    ></app-deleteModal>
                                </div>
                            </li>
                            <li class="table-controls__item">
                                <router-link tag="button" title="Настройки сообщения"
                                             :to="{name: 'editCoordinate', params: {id: index }}"
                                >
                                    <svg class="table-controls__item-img" role="img" width="20px" height="20px">
                                        <use xlink:href="../../../public/img/svg/sprite.svg#user-settings"></use>
                                    </svg>
                                </router-link>
                            </li>
                        </ul>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

        <br>

        <div>
            <button tag="button" title="Назад" @click="$router.go(-1)">
                Назад
            </button>

            <button @click="updateCoordinateSettings">Сохранить</button>
        </div>
    </section>
</template>

<script>
import axios from 'axios'
    export default {
        data () {
            return {
                newItem: '',
                text: '',
                coordinate1: '',
                coordinate2: '',
                messages: [],
                showModal: false,
                deleteMessageId: '',
            }
        },
        beforeMount () {
            this.updateCoordinateSettings()
        },
        methods: {
            updateCoordinateSettings () {
                axios.get("/admin/settings/coordinate",
                    { params: {
                        text:           this.text,
                        coordinate1:    this.coordinate1,
                        coordinate2:    this.coordinate2,
                        messages:       this.messages
                    }}).then(response => {
                    this.messages = response.data
                    this.newItem = response.data.length
                })
            },
            deleteMessage(deleteMessageId) {
                this.showModal = false;
                axios.get("/admin/settings/deleteCoordinate",
                    { params: {
                        id: deleteMessageId
                    }}).then(response => {
                    if (response.data === 'success') {
                        this.updateCoordinateSettings()
                    }
                })
            },
            setMessageId(MessageId) {
                this.showModal = true;
                this.deleteMessageId = MessageId
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