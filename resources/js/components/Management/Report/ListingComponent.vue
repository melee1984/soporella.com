<template>

   <div class="card">
    <div class="card-header py-4">
      <h5>Attractions</h5>
    </div>
    <div class="card-body">
      <table class="table">
        <thead class="thead-light">
          <tr>
            <th scope="col">Attraction Name</th>
            <th scope="col">Variant</th>
            <th scope="col">Quantity</th>
            <th scope="col">Price</th>
          </tr>
        </thead>
        <tbody>
              <tr v-for="detail in details">
                <td colspan="5" style="border: 0px;">
                  <table width="100%" class="table">
                    <tr v-for="variance in detail.variance_details">
                      <td scope="col" width="40%">{{ detail.attraction.title }}</td>
                      <td scope="col">{{ variance.title }}</td>
                      <td scope="col">{{ variance.qty }}</td>
                      <td scope="col">{{ variance.price }} </td>
                    </tr>
                  </table>            
                </td>
              </tr>
        </tbody>
      </table>
    </div>
  </div>

</template>

<script>
    
    export default {
      data() {
        return {
          field: {
            title: "",
            active: false,
            is_menu: false,
            sorting: "",
          },
          ObjArray: {},
        }
      },
      props: ['details'],
      computed: {
       
      },
      mounted() {

      },
      created() {
        
      },
      methods: {
        fetchData: function() {
          var self = this;
          axios.get('/api/management/topattraction/list?api_token='+api_token).then(function (response) {
              self.ObjArray = response.data.records;
          }).catch(function (error) {
              console.log(error);
          });
        },
        
        updateMenu: function(obj) {
          var self = this;
          axios.post('/api/management/topattraction/'+obj.id+'/add/submit?api_token='+api_token).then(function (response) {
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
