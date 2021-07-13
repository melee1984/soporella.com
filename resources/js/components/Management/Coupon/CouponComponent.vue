<template>

  <div class="col-sm-12 col-xl-12">
    <div class="card">
      <div class="card-header">
       <div class="row">
          <div class="col-md-6">
            <h5>Coupon</h5>
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
                              <th scope="col" width="70%">Coupon</th>
                              <th scope="col" width="10%">Amount</th>
                              <th scope="col" width="5%"></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr v-if="!objArray.length">
                              <td colspan="4">No record found</td>
                            </tr>
                            <tr v-for="coupon in objArray">
                              <td> 
                                <div class="media">
                                  <div class="media-body text-left icon-state">
                                    <label class="switch">
                                      <input type="checkbox" v-model="coupon.active" @change="updateStatus(coupon)"><span class="switch-state"></span>
                                    </label>
                                  </div>
                                </div>
                              </td>
                              <td>
                                {{ coupon.coupon }}
                              </td>
                               <td>
                                {{ coupon.discount_amount }}
                              </td>
                             
                              <td class="text-right">
                                <a href="javascript:void(0)" class="btn btn-square btn-light btn-sm" v-on:click="deleteRecord(coupon)">Delete</a>
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

            <div class="col-md-6" v-if="addForm || editForm">
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
                                    <label for="title">Coupon</label>
                                    <input class="form-control" id="title" type="text" data-original-title="" title="" v-model="field.coupon">
                                  </div>
                                     <div class="form-group col-12">
                                    <label for="title">Amount</label>
                                    <input class="form-control" id="title" type="text" data-original-title="" title="" v-model="field.discount_amount">
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
            discount_amount: "",
            coupon: "",
          },
          objArray: {},
          lang: JSON.parse(localStorage.selectedLanguage).country_code,
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
          axios.get('/api/management/coupon?api_token='+api_token).then(function (response) {
              self.objArray = response.data.coupons;
             
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
              url = '/api/management/category/submit?api_token='+api_token;
          }
          else if (self.editForm) {
              url = '/api/management/category/'+self.field.id+'/update/submit?api_token='+api_token;

          }
          formData.append('active', self.field.active);
          formData.append('amount', self.field.amount);
          formData.append('coupon', self.field.coupon);

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
          axios.post('/api/management/category/'+obj.id+'/status/submit?api_token='+api_token).then(function (response) {
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
            axios.post('/api/management/coupon/'+obj.id+'/delete/submit?api_token='+api_token).then(function (response) {
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
        },
      }
    }
</script>
