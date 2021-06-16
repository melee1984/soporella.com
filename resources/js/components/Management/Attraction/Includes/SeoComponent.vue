<template>
   <div>
    <div class="card">
      <div class="card-header">
        <h5>Other Information</h5>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-lg-12 col-sm-12">
            <div class="row">
               <div class="form-group col-12">
                  <label for="description">Title</label>
                <input class="form-control" id="title" type="text" data-original-title="" title="" v-model="field.meta_title">

                </div>
                <div class="form-group col-12">
                  <label for="description">Description</label>
                    <wysiwyg v-model="field.meta_description"/>
                </div>
                 <div class="form-group col-12">
                  <label for="description">Keyword</label>
                    <wysiwyg v-model="field.meta_keyword"/>
                </div>
                
          </div>
           <div class="col-lg-4 col-sm-4">
             
           </div>
          </div>
        </div>
         <div class="card-footer">
            <a href="javascript:void(0)" class="btn btn-sm btn-primary" v-on:click="updateRecord">Update</a> 
            <a href="/dashboard/attraction" class="btn btn-sm btn-light">Cancel</a> 
         </div>
      </div>
    </div>  
  </div>
</template>
<script>
    export default {
       data() {
        return {
          selectedLanguage: {},
          field: {
            meta_title: this.attraction.meta_title,
            meta_description: this.attraction.meta_description,
            meta_keyword: this.attraction.meta_keyword,
          }
        }
      },
      props:['attraction'],
      mounted() {
        
      },
      created() {
        
      },
      methods: {
        fetchData: function() {
         
        },
        updateRecord: function(obj) {
          
          var self = this;
          axios.post('/api/management/seo/'+self.attraction.id+'/submit?api_token='+api_token, {
              meta_title: self.field.meta_title,
              meta_description: self.field.meta_description,
              meta_keyword: self.field.meta_keyword,
              
            }).then(function (response) {
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
