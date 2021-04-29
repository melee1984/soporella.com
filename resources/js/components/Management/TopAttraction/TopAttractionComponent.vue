<template>

  <div class="col-sm-12 col-xl-12">
    <div class="card">
      <div class="card-header">
       <div class="row">
          <div class="col-md-6">
            <h5>Top Attraction</h5>
          </div>
          <div class="col-md-6 text-right"></div>
       </div>
      </div>
      <div class="card-body megaoptions-border-space-sm">
          <div class="row">
             <div class="col-md-12">
                <!-- start here --> 
                  <div class="card">
                  <div class="card-block row">
                    <div class="col-sm-12 col-lg-12 col-xl-12">
                      <div class="table-responsive">
                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col" width="5%">Active</th>
                              <th scope="col" width="90%">Attraction</th>
                              <th scope="col" width="5%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-if="!ObjArray.length">
                              <td colspan="4">No record found</td>
                            </tr>
                            <tr v-for="item in ObjArray">
                              <td> 
                                <div class="media">
                                  <div class="media-body text-left icon-state">
                                    <label class="switch">
                                      <input type="checkbox" v-model="item.mapped" @change="updateMenu(item)"><span class="switch-state"></span>
                                    </label>
                                  </div>
                                </div>
                              </td>
                              <td>{{ item.title }}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end here -->
             </div>
          </div>

      </div>
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
      computed: {
       
      },
      mounted() {

      },
      created() {
        this.fetchData();
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
