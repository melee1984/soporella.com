<template>
   <div>
     <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col" width="10%"></th>
            <th scope="col" width="10%">Active</th>
            <th scope="col" width="40%">Category</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="!objArray.length">
            <td colspan="4">No record found</td>
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
            <td></td>
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
          axios.get('/api/management/attraction/'+ self.attraction.id +'/category?api_token='+api_token).then(function (response) {
              self.objArray = response.data.categories;
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
        updateMapping: function(category) {

          var self = this;
          axios.post('/api/management/attraction/'+self.attraction.id+'/category/'+category.id+'/map/submit?api_token='+api_token).then(function (response) {
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
