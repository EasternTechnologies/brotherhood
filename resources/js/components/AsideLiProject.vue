<template>
    <li class="nav__subitem">
        <h4 class="nav__subtitle submenu" @click="visible = !visible">{{ project.title }}</h4>

        <ul class="nav__sublist" v-show="visible" v-for="option in options" :key="option.id" @click="reloadData">
            <router-link :to="'/admin/projects/' + project.slug + '/' + option.url"  class="nav__subitem">
                <a class="nav__sublink">{{option.text}}</a>
            </router-link>
        </ul>
    </li>
</template>

<script>
import {eventEmitter} from '../admin'

export default {
    props:['project'],
    data () {
        return {
            visible: false,
            options: [
                { url: 'moderation', text: 'Модерация' },
                { url: 'materials', text: 'Материалы' },
            ]
        }
    },
    methods:{
        reloadData() {
            eventEmitter.$emit('updateData')
        },
    },
}
</script>
