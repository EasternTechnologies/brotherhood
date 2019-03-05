<template>
  <p class="join-form__block">
    <label aria-label="Поле ввода страны, обязательно для заполнения">
      <input class="join-form__field" name="country" type="text" placeholder="Страна*:" required v-model="queryString" @keyup="getResult">
    </label>
    <ul v-if="countries.length">
      <li v-for="country in countries"> {{country.name}} </li>
    </ul>
  </p>
  <!-- <div>
    <input type="text" v-model="queryString" @keyup="getResult">
    <div>
      <ul>
        <li v-for="country in countries" @click="search"> {{country}} </li>
      </ul>
    </div>

    <button type="btn" @click="search"> search </button>

  </div> -->
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
        let language = $('.languages-form__field option:checked').val();
        
        this.countries = [];
        let language = $('.languages-form__field option:checked').val();

        axios.get('/language', { params: { queryString: this.queryString, language: language } }).then(response => {
          response.data.forEach((country) => {
            this.countries.push(country);
          });
        })
      }
    }
  }

</script>
