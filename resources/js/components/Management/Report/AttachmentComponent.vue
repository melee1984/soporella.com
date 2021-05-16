<template>

   <div class="col-xl-4 col-lg-6 box-col-6 debit-card">
      <div class="card">
        <div class="card-header py-4">
          <h5>Status</h5>
        </div>
        <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="exampleFormControlSelect9">Status</label>
                      <select class="form-control" id="exampleFormControlSelect9" v-model="field.status">
                        <option>Select Status</option>
                        <option v-for="sts in status" :value="sts.id">{{ sts.title }}</option>
                      </select>
                    </div>
                  </div>

                    <div class="col-12">
                    <div class="form-group">
                      <label for="exampleFormControlSelect9">Upload Files</label>
                      <input type="file" name="file"  class="form-control"  @change="uploadFile" multiple>
                    </div>
                  </div>
                </div>
                
              <div class="text-right">
                <br>
                <button class="btn btn-primary btn-block" type="button" v-on:click="submit">Submit</button>
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
            status: this.cart.status_id,
            files: null,
          },
          ObjArray: {},
        }
      },
      props: ['details','status', 'cart'],

      computed: {
       
      },
      mounted() {

      },
      created() {
        
      },
      methods: {
        uploadFile (event) {
          this.field.files = event.target.files
        },
        fetchData: function() {
          var self = this;
          axios.get('/api/management/topattraction/list?api_token='+api_token).then(function (response) {
              self.ObjArray = response.data.records;
          }).catch(function (error) {
              console.log(error);
          });
        },
        submit: function() {
          var self = this;
          const formData = new FormData();
          formData.append('status', self.field.status)

          if (self.field.files) {
            for (const i of Object.keys(self.field.files)) {
              formData.append('files[]', self.field.files[i], self.field.files[i].name);
            }  
          }
          
          var url = '/api/management/'+ self.cart.id +'/report/attach/submit?api_token='+api_token;
          axios.post(url, formData).then(function (response) {

            if (response.data.status) {
              self.$toasts.success(response.data.message);
              location.reload();

            }
            else {
               self.$toasts.error(response.data.message);
            }

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
