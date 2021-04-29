<template>
   <div class="translate_wrapper">
      <div class="current_lang">
        <div class="lang" v-if="selectedLanguage">
            <i :class="'flag-icon '+selectedLanguage.fla_icon"></i><span class="lang-txt">{{ selectedLanguage.country_code }}</span>
        </div>
      </div>
     <div class="more_lang">
      <div class="lang" v-for="country in countries" v-bind:class="{'selected': selectedLanguage.country_code==country.country_code}"  :data-value="country.country_code" v-on:click="selectLang(country)">
          <i :class="'flag-icon ' + country.fla_icon"></i>
          <span class="lang-txt">{{ country.country_name }}</span>
      </div>
    </div>
   </div>
</template>

<script>
    export default {
       data() {
        return {
          countries: {},
          selectedLanguage: {}
        }
      },
      mounted() {
        if (localStorage.selectedLanguage) {
          this.selectedLanguage = JSON.parse(localStorage.selectedLanguage);
        }
      },
      created() {
        this.fetchData();
      },
      methods: {
        fetchData: function() {
          var self = this;
          axios.get('/api/management/get/countries?api_token='+api_token).then(function (response) {
              self.countries = response.data.countries;
              if (!localStorage.selectedLanguage) {
                self.selectedLanguage = self.countries[0];
                let center = {
                    country_code: self.selectedLanguage.country_code,
                    country_name: self.selectedLanguage.country_name,
                    fla_icon: self.selectedLanguage.fla_icon,
                }
                localStorage.selectedLanguage = JSON.stringify(center);
              }
          }).catch(function (error) {
              console.log(error);
          });
        },
        selectLang: function(language) {
          this.selectedLanguage = language;
          let center = {
              country_code: language.country_code,
              country_name: language.country_name,
              fla_icon: language.fla_icon,
          }
          localStorage.selectedLanguage = JSON.stringify(center);
          axios.post('/api/management/set/language?api_token='+api_token, {
            lang: language.country_code,
          }).then(function (response) {
            if (response.data.status) {
                location.reload();
            }
            else {
               this.$toasts.error(response.data.message);
            }
          }).catch(function (error) {
              console.log(error);
          });


          
        },

      }
    }
</script>
