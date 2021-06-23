<template>
    <div>
        <a v-for="country in countries" :href="mainURL+'/lang/'+ country.country_code+'?r='+page_url" class="flag-active">
            <i :class="'flag-icon ' + country.fla_icon"></i>
        </a>
    </div>
</template>

<script>
    export default {
       data() {
        return {
          countries: {},
          selectedLanguage: {},
          mainURL: MAINURL,
          page_url: page_url,
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
          axios.get(MAINURL+'/get/countries').then(function (response) {
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
