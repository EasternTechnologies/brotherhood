<template>
  <div>
    <input type="text" v-model="queryString" @keyup="getResult()">
    <div>
      <ul>
        <li v-for="country in countries" @click="search"> {{country}} </li>
      </ul>
    </div>

    <button type="btn" @click="search"> search </button>

  </div>
</template>

<script>  



  export default {
    data() {
      return {
        queryString: '',
        countries: []
      }
    },
    methods: {
      getResult() {
        this.countries = [];
        let language = $('.languages-form__field option:checked').val();

        axios.get('/language', { params: { queryString: this.queryString, language: language } }).then(response => {
          response.data.forEach((country) => {
            this.countries.push(country);
          });
        })
      },
      search() {
        console.log(language)
      }
    }
  }

</script>
