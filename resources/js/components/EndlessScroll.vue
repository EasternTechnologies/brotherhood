<template>
  <ul class="quotes__list" ref="quotes" @scroll="scroll">
    <li class="quotes__item quote" v-for="person in persons">
      <blockquote>
        <p>
          {{ person.text }}
        </p>
        <cite>
          {{ person.user.name }}
        </cite>
      </blockquote>
    </li>
  </ul>
</template>

<script>
  export default {
    data() {
      return {
        persons: []
      }
    },
    methods: {
      getInitialUsers() {
        axios.get(`/project/1/loadpost`)
          .then(response => {
            for (var i = 0; i < response.data.length; i++) {
              this.persons.push(response.data[0])
            }
          })
      },

      scroll() {

        let block = this.$refs.quotes;
        let last = block.lastChild;

        let blockSize = block.scrollTop + block.offsetHeight + block.offsetTop;
        let lastSize = last.offsetTop + last.offsetHeight;

        if (blockSize >= lastSize) {
          let country = $('.search-form input').val();
          console.log(country)

          axios.get(`/project/1/loadpost`, { params: { personsLength: this.persons.length, country: country } })
            .then(response => {
              this.persons.push(response.data[0]);
            })
        }
      },
    },
    beforeMount() {
      this.getInitialUsers();
    },
    mounted() {
      this.scroll();
    }
  }

</script>
