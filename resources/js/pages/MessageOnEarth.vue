<template>
    <section class="section dashboard">
        <header class="section-header">
            <h2 class="section-header__title dashboard__title">Сообщения на планете</h2>
        </header>
        <div class="section-body dashboard__body">
            <h2>Добавить новое сообщение</h2>
            <table>
                <thead>
                <tr>
                    <th>Текст сообщения</th>
                    <th>Координата 1</th>
                    <th>Координата 2</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <label>
                            <input v-model="text" type="text">
                        </label>
                    </td>
                    <td>
                        <label>
                            <input v-model="coordinate1" type="number">
                        </label>
                    </td>
                    <td>
                        <label>
                            <input v-model="coordinate2" type="number">
                        </label>
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <h2>Список старых сообщений</h2>
            <table>
                <thead>
                <tr>
                    <th>Текст сообщения</th>
                    <th>Координата 1</th>
                    <th>Координата 2</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="message in messages">
                    <td>
                        <label>
                            <input v-model="message.properties.place" type="text">
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="number">
                        </label>
                    </td>
                    <td>
                        <label>
                            <input type="number">
                        </label>
                    </td>
                </tr>
                <br>
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
                text: '',
                coordinate1: '',
                coordinate2: '',
                messages: []
            }
        },
        // beforeMount () {
        //     this.updateCoordinateSettings()
        // },
        methods: {
            updateCoordinateSettings () {
                axios.get("/admin/settings/coordinate",
                    { params: {
                            text: this.text,
                            coordinate1: this.coordinate1,
                            coordinate2:    this.coordinate2
                        }}).then(response => {
                    this.messages = response.data
                })
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