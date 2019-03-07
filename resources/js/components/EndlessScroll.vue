<template>
  <ul class="quotes__list" ref="quotes" @scroll="scroll">
     <li class="quotes__item quote" v-for="person in persons">
    <!--<li class="quotes__item quote">-->
      <blockquote>
        <p>
          {{ person.text }}
        </p>
        <cite>
          {{ person.user.name }}
        </cite>
      </blockquote>
    </li>
    <!--<li class="quotes__item quote">-->
      <!--<blockquote>-->
        <!--<p>-->
          <!--Следует отметить, что социально-экономическое развитие требует анализа инновационных методов управления процессами. Высокий-->
          <!--уровень вовлечения представителей целевой аудитории является четким доказательством простого факта: перспективное-->
          <!--планирование предоставляет широкие возможности для благоприятн.-->
        <!--</p>-->
        <!--<cite>-->
          <!--Захаров Игорь Васильевич-->
        <!--</cite>-->
      <!--</blockquote>-->
    <!--</li>-->
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
        for (var i = 0; i < 10; i++) {
          axios.get(`/project/1/loadpost`)
            .then(response => {
              // this.persons.push(response.data.results[0])
              this.persons.push(response.data[0])

              console.log(response.data[0])
            })
        }
      },
      // scroll(person) {

      scroll() {
        // window.onscroll = () => {
          // let bottomOfWindow = document.documentElement.scrollTop + window.innerHeight === document.documentElement.offsetHeight;
          let block =  this.$refs.quotes;
          let last = block.lastChild;

          let blockSize = block.scrollTop + block.offsetHeight + block.offsetTop;
          let lastSize = last.offsetTop + last.offsetHeight;

          console.log(blockSize, lastSize);

          if(blockSize >= lastSize) {
              axios.get(`/project/1/loadpost`)
                 .then(response => {
                   // person.push(response.data.results[0]);
                   this.persons.push(response.data[0]);

                 })
              console.log('scroll')
          }

          // if (bottomOfWindow) {
          //   // axios.get(`https://randomuser.me/api/`)
          //   //   .then(response => {
          //   //     person.push(response.data.results[0]);
          //   //   })
          //   console.log('scroll')
          // }
        // }
      },
    },
    beforeMount() {
      this.getInitialUsers();
    },
    mounted() {
      // this.scroll(this.person);
      this.scroll();

    }
  }

</script>
