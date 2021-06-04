<template>

  <div class="col-sm-12 col-xl-12">
    <div class="card">
      <div class="card-header">
       <div class="row">
          <div class="col-md-6">
            <h5>Language</h5>
          </div>
          <div class="col-md-6 text-right">
            <a href="javascript:void(0)" class="btn btn-danger btn-sm" v-if="!addForm" v-on:click="formAdd">Add New</a>
          </div>
       </div>
      </div>
      <div class="card-body megaoptions-border-space-sm">
          <div class="row" v-if="viewListing">
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
                              <th scope="col" width="20%">Country</th>
                              <th scope="col" width="10%">Code</th>
                              <th scope="col" width="10%">Conversion</th>
                              <th scope="col" width="10%">Currency</th>
                              <th scope="col" width="5%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-if="!languageArray.length">
                              <td colspan="6">No record found</td>
                            </tr>
                            <tr v-for="langauge in languageArray">
                              <td> 
                                <div class="media">
                                  <div class="media-body text-left icon-state">
                                    <label class="switch">
                                      <input type="checkbox" v-model="langauge.active" @change="updateStatus(langauge)"><span class="switch-state"></span>
                                    </label>
                                  </div>
                                </div>
                              </td>
                              <td><a href="javascript:void(0)" v-on:click="formEdit(langauge)">{{ langauge.country_name }}</a></td>
                              <td><a href="javascript:void(0)" v-on:click="formEdit(langauge)">{{ langauge.country_code }}</a></td>
                              <td><a href="javascript:void(0)" v-on:click="formEdit(langauge)">{{ langauge.conversion }}</a></td>
                              <td><a href="javascript:void(0)" v-on:click="formEdit(langauge)">{{ langauge.currency }}</a></td>
                             
                              <td class="text-right">
                                <a href="javascript:void(0)" class="btn btn-square btn-light btn-sm" v-on:click="deleteRecord(langauge)">Delete</a>
                              </td>
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

            <div class="col-md-12" v-if="addForm || editForm">
              <div class="card">
                <div class="collapse show" aria-labelledby="collapseicon" data-parent="#accordion">
                  <div class="card-body filter-cards-view animate-chk">
                    <div class="checkbox-animated mt-0">
                      <div class="row">
                        <div class="col-md-12">
                            <form class="form theme-form">
                              <div class="card-body">
                                <div class="row">
                                   <div class="form-group col-12">
                                     <label class="d-block" for="active">
                                      <input class="checkbox_animated" id="active" name="active" value="1" type="checkbox" data-original-title="" title="" v-model="field.active" > Active
                                    </label>
                                  </div>
                                
                                  <div class="form-group col-12">
                                    <label for="title">Country</label>
                                    <input class="form-control" type="text" data-original-title="" title="" v-model="field.country_name">
                                  </div>
                                   <div class="form-group col-12">
                                    <label for="title">Country Code</label>
                                    <input class="form-control"type="text" data-original-title="" title="" v-model="field.country_code" placeholder="eg. EN">
                                  </div>
                                  
                                  <div class="form-group col-12">
                                    <label for="title">Conversion</label>
                                    <input class="form-control" type="text" data-original-title="" title="" v-model="field.conversion">
                                  </div>
                                   <div class="form-group col-12">
                                    <label for="title">Currency</label>
                                    <input class="form-control" type="text" data-original-title="" title="" v-model="field.currency" placeholder="eg. AED">
                                  </div>

                                  <div class="form-group col-12">
                                    <label for="title">Flag Icon </label>
                                    <input class="form-control" type="text" placeholder="eg. flag-icon-us" v-model="field.fla_icon">
                                    <span class="text-muted"><small>You may add the following flag icon in this url. <a target="_blank" href="https://alexsobolenko.github.io/flag-icons/">Flag Icons</a></small></span>
                                  </div>
                                  
                                </div>
                              </div>
                              <div class="card-footer">
                                <a href="javascript:void(0)" class="btn btn-square btn-primary btn-sm" v-on:click="store">Submit</a>
                                <a href="javascript:void(0)" class="btn btn-square btn-light pull-right btn-sm" v-on:click="cancelForm">Cancel</a>
                              </div>
                            </form>
                        </div>
                      </div>    
                    </div>
                  </div>
                </div>
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
            country_name: "",
            country_code: "",
            conversion: "",
            currency: "",
            fla_icon: "",
          },
          languageArray: {},
          addForm: false,
          editForm: false,
          viewListing: true,
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
          axios.get('/api/management/language?api_token='+api_token).then(function (response) {
              self.languageArray = response.data.languages;
             
          }).catch(function (error) {
              console.log(error);
          });
        },
        store: function() {
          
          var self = this;
          self.loading= true;
          var url = "";
          let formData = new FormData();
          if (self.addForm) {
              url = '/api/management/language/submit?api_token='+api_token;
          }
          else if (self.editForm) {
              url = '/api/management/language/'+self.field.id+'/update/submit?api_token='+api_token;
          }

          formData.append('active', self.field.active);
          formData.append('country_code', self.field.country_code);
          formData.append('country_name', self.field.country_name);
          formData.append('fla_icon', self.field.flag);
          formData.append('conversion', self.field.conversion);
          formData.append('currency', self.field.currency);
          
          axios.post(url, formData).then(function (response) {
            if (response.data.status) {
              self.cancelForm();
              self.fetchData();
              self.$toasts.success(response.data.message);
            }
            else {
               self.$toasts.error(response.data.message);
            }
            self.loading = false;
          }).catch(function (error) {
              console.log(error);
          });
        },
        updateStatus: function(obj) {
          var self = this;
          axios.post('/api/management/language/'+obj.id+'/status/submit?api_token='+api_token).then(function (response) {
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
        
        deleteRecord(obj) {
          var self = this;
          self.loading= true;
          var txt;
          var r = confirm("Are you sure you want to delete this record?");
          if (r == true) {
            axios.post('/api/management/language/'+obj.id+'/delete/submit?api_token='+api_token).then(function (response) {
              if (response.data.status) {
                self.fetchData();
                self.$toasts.success(response.data.message);
              }
              else {
                 self.$toasts.error(response.data.message);
              }
              self.loading = false;
            }).catch(function (error) {
                console.log(error);
            });
          }
        },
        cancelForm: function() {
          this.addForm = false;
          this.viewListing = true;
          this.editForm = false;
          this.field = {};
        },
        formAdd: function() {
          this.addForm = true;
          this.viewListing = false;
          this.editForm = false;
           this.field = {};
        },
        formEdit: function(obj) {
          this.addForm = false;
          this.viewListing = false;
          this.editForm = true;
          this.field = obj;
          this.field.title = "";
        },
      }
    }
</script>
