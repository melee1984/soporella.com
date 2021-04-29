<template>
   <div>
     <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col" width="5%"></th>
            <th scope="col" width="95%">Attraction</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="!objArray.length">
            <td colspan="2">No record found</td>
          </tr>
          <tr v-for="obj in objArray">
            <td> 
              <div class="media">
                <div class="media-body text-left icon-state">
                  <label class="switch">
                    <input type="checkbox" v-model="obj.mapped" @change="updateMapping(obj)"><span class="switch-state"></span>
                  </label>
                </div>
              </div>
            </td>
            <td>
              {{ obj.title }}
            </td>
          </tr>
        </tbody>
      </table>
  </div>
</template>
<script>
    export default {
       data() {
        return {
          selectedLanguage: {},
          objArray: {},
        }
      },
      props:['attraction'],
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
          axios.get('/api/management/'+ self.attraction.id +'/upsell?api_token='+api_token).then(function (response) {
              self.objArray = response.data.record;
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
        updateMapping: function(obj) {
          var self = this;
          axios.post('/api/management/upsell/'+self.attraction.id+'/add/'+obj.id+'/submit?api_token='+api_token).then(function (response) {
              if (response.data.status) {
                  self.$toasts.success(response.data.message);
              }
              else {
                 self.$toasts.error(response.data.message);
              }
          }).catch(function (error) {
              self.$toasts.error(error.response.data.errors['file'][0]);
          });

        },
      }
    }
</script>
