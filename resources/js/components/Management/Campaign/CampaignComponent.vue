<template>

  <div class="col-sm-12 col-xl-12">
    <div class="card">
      <div class="card-header">
       <div class="row">
          <div class="col-md-6">
            <h5>Campaign</h5>
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
                              <th scope="col" width="">Attraction</th>
                              <th scope="col" width="">Display Option</th>
                              <th scope="col" width="">Discount</th>
                              <th scope="col" width="">Slider</th>
                              <th scope="col" width="5%"></th>
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
                                      <input type="checkbox" v-model="obj.active" @change="updateStatus(obj)"><span class="switch-state"></span>
                                    </label>
                                  </div>
                                </div>
                              </td>
                              <td>
                                <a href="javascript:void(0)" v-on:click="formEdit(obj)">
                                  {{ obj.attraction.title }}
                                </a>
                                  
                              </td>
                              <td>
                                  {{ obj.display_option }}
                              </td>
                              <td>
                                  {{ obj.discount_string }}
                              </td>
                                <td>
                                  {{ obj.slider }}
                              </td>
                              <td class="text-right">
                                <a href="javascript:void(0)" class="btn btn-square btn-light btn-sm" v-on:click="deleteRecord(obj)">Delete</a>
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

          <div class="row">
              
              <div class="col-md-6 col-lg-6" v-if="addForm || editForm">
              <div class="card">
                <div class="collapse show" aria-labelledby="collapseicon" data-parent="#accordion">
                  <div class="card-body filter-cards-view animate-chk">
                    <div class="checkbox-animated mt-0">
                      <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <form class="form theme-form">
                              <div class="card-body">
                                <div class="row">

                                  <div class="form-group col-12">
                                     <label class="d-block" for="active">
                                      <input class="checkbox_animated" value="1" type="checkbox" data-original-title="" title="" v-model="field.active" > Active
                                    </label>
                                  </div>

                                  <div class="form-group col-12">
                                     <label class="d-block" for="active">
                                      <input class="checkbox_animated" value="1" type="checkbox" data-original-title="" title="" v-model="field.slider" > Slider
                                    </label>
                                  </div>
                                  
                                  <div class="form-group col-12">
                                    <label for="title">Display</label>
                                    <select class="form-control" v-model="field.display_option">
                                      <option value="">Select Display</option>
                                      <option v-for="display in displaying" :value="display.id">{{ display.value }}</option>
                                    </select>
                                  </div>

                                  <div class="form-group col-12">
                                    <label for="title">Attraction</label>
                                     <select class="form-control" v-model="field.attraction_id">
                                      <option value="">Select Attraction</option>
                                      <option  v-for="attraction in attractions" :value="attraction.id">{{ attraction.title }}</option>
                                    </select>
                                  </div>

                                  <div class="form-group col-12">
                                    <label for="title">Discount Label</label>
                                    <input class="form-control" data-original-title="" title="" v-model="field.discount_string" placeholder="eg.  50%">
                                  </div>

                                 <!--  <div class="form-group col-12">
                                    <label for="title">Sorting</label>
                                    <input class="form-control" data-original-title="" title="" v-model="field.sorting">
                                  </div> -->

                                  <div class="form-group col-12" v-if="field.display_option == 1">
                                    <label for="title">Banner Image</label>
                                    <input type="file" class="form-control" @change="onFileSelected">
                                  </div>

                                  <div class="form-group col-12" v-if="field.display_option == 2">
                                    <label for="title">Image</label>
                                    <input type="file" class="form-control" @change="onFileSelected1">
                                    <span class="text-muted"><small>If slider is selected then this will be the primary photo display on the homepage.</small></span>
                                  </div>

                                <!--   <div class="form-group col-12" v-if="field.display_option == 1">
                                    <label for="title">Image 2</label>
                                    <input type="file" class="form-control">
                                  </div> -->

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
            <div class="col-md-6 col-lg-6" v-if="addForm || editForm">

                <div v-if="field.display_option == 1">
                  <label>Banner</label>
                  <img :src="field.large_img" alt="" class="img-fluid">
                  <br>
                  <a href="javascript:void(0)" v-if="field.large_img"><small>Delete</small></a>
                </div>

                 <div v-if="field.display_option == 2">
                  <label>Photo</label>
                  <img :src="field.img_1" alt="" class="img-fluid">
                  <br>
                  <a href="javascript:void(0)" v-if="field.img_1"><small>Delete</small></a>
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
            display_option: "",
            discount_string: "",
            attraction_id: "",
            slider: false,
            file: "",
            img_1: "",
          },
          objArray: {},
          lang: JSON.parse(localStorage.selectedLanguage).country_code,
          addForm: false,
          editForm: false,
          viewListing: true,
          displaying: {},
          attractions: {},
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
          axios.get('/api/management/campaign?api_token='+api_token).then(function (response) {
              self.objArray = response.data.campaigns;
              self.displaying = response.data.display_options;
              self.attractions = response.data.attractions;
          }).catch(function (error) {
              console.log(error);
          });
        },
        onFileSelected: function(e) {
            this.field.file = e.target.files[0];
        },
        onFileSelected1: function(e) {
            this.field.img_1 = e.target.files[0];
        },
        store: function() {
          
          var self = this;
          self.loading= true;
          var url = "";
          let formData = new FormData();
          if (self.addForm) {
              url = '/api/management/campaign/submit?api_token='+api_token;
          }
          else if (self.editForm) {
              url = '/api/management/campaign/'+self.field.id+'/update/submit?api_token='+api_token;
          }

          if (self.field.display_option == 1) {
            if (self.field.file) {
              formData.append('file', self.field.file, self.field.file.name);
            }
          }

          if (self.field.display_option == 2) {
            if (self.field.img_1) {
              formData.append('file', self.field.img_1, self.field.img_1.name);
            }
          }

          formData.append('active', self.field.active);
          formData.append('attraction_id', self.field.attraction_id);
          formData.append('display_option', self.field.display_option);
          formData.append('slider', self.field.slider);
          formData.append('discount_string', self.field.discount_string);

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
          axios.post('/api/management/campaign/'+obj.id+'/status/submit?api_token='+api_token).then(function (response) {
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
            axios.post('/api/management/campaign/'+obj.id+'/delete/submit?api_token='+api_token).then(function (response) {
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
          this.field = {
            title: "",
            active: false,
            sorting: "",
            display_option: "",
            discount: "",
            attraction_id: "",
            slider: false,
           };
        },
        formAdd: function() {
          this.addForm = true;
          this.viewListing = false;
          this.editForm = false;
          this.field = {
            title: "",
            active: false,
            sorting: "",
            display_option: "",
            discount: "",
            attraction_id: "",
            slider: false,
           };
        },
        formEdit: function(obj) {
          this.addForm = false;
          this.viewListing = false;
          this.editForm = true;
          this.field = obj;
        },
      }
    }
</script>
