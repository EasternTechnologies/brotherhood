<template>
    <section class="section dashboard">
        <header class="section-header">
            <h2 class="section-header__title dashboard__title">Сообщения на планете</h2>
        </header>
        <div class="section-body dashboard__body">
            <h2 v-if="id === ''">Добавить новое сообщение</h2>
            <h2 v-if="id !== ''">Редактировать сообщение</h2>

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
        </div>

        <br>

        <div>
            <button tag="button" title="Назад" @click="$router.go(-1)">
                Назад
            </button>

            <button @click="updateCoordinate">Сохранить</button>
        </div>
    </section>
</template>

<script>
    import axios from 'axios'
    export default {
        data () {
            return {
                id: '',
                url: '',
                text: '',
                coordinate1: '',
                coordinate2: '',
            }
        },
        mounted () {
            console.log(this.$route.params['id']);

            if (this.$route.params['id'] || this.$route.params['id'] !== null) {
                this.id = this.$route.params['id'];
                this.url = 'editCoordinate';
                this.updateCoordinate()
            }else{
                this.url = 'newCoordinate'
            }
            console.log(this.url);
        },
        methods: {
            updateCoordinate () {
                axios.get("/admin/settings/" + this.url,
                    { params: {
                        id:             this.id,
                        text:           this.text,
                        coordinate1:    this.coordinate1,
                        coordinate2:    this.coordinate2,
                    }}).then(response => {
                        console.log(this.id)
                    if (response.data === 'success') {
                        this.$router.go(-1)
                    }
                    if (this.id !== '') {

                        this.text = response.data.properties.place;
                        this.coordinate1 = response.data.geometry.coordinates[0];
                        this.coordinate2 = response.data.geometry.coordinates[1]
                    }
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