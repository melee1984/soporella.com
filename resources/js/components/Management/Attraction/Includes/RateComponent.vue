<template>
   <div class="row">

    <div class="col-md-6" v-if="actionAdd || actionEdit">
        <div class="card">
          <div class="card-header">
            <div class="row">
                <h5 class="mb-0">Add</h5>
            </div>
          </div>
          <div class="collapse show" id="collapseicon" aria-labelledby="collapseicon" data-parent="#accordion">
            <div class="card-body filter-cards-view animate-chk">
                <div class="form-group col-12">
                   <label class="d-block" for="active">
                    <input class="checkbox_animated" id="active" name="active" value="1" type="checkbox" data-original-title="" title="" v-model="field.active" > Active
                  </label>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Title</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title" v-model="field.title">
                </div>
                 <div class="form-group">
                  <label for="exampleFormControlTextarea1">Description</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter Description" v-model="field.description"></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Sorting</label>
                  <input type="text" class="form-control" v-model="field.sorting" placeholder="eg. 1">
                </div>
                <button type="button" class="btn btn-square btn-primary" v-on:click="submitRecord">Submit</button>
                <a href="javascript:void(0)" class="btn btn-square btn-light" v-on:click="cancel">Cancel</a>
            </div>
          </div>
        </div>
    </div>

    <div class="col-md-12" v-if="actionDisplay">
        <div class="card">
          <div class="card-header">
            <div class="row">
               <div class="col-md-6">
                <h5 class="mb-0">Rates</h5>
              </div>
              <div class="col-md-6 text-right">
                <button class="btn btn-pill btn-primary btn-air-primary btn-xs" type="button" data-original-title="btn btn-pill btn-primary btn-air-primary btn-xs" title="" v-on:click="addNew">Add New</button>
              </div>
            </div>
          </div>
          <div class="collapse show" id="collapseicon" aria-labelledby="collapseicon" data-parent="#accordion">
            <div class="card-body filter-cards-view animate-chk">
              <div class="checkbox-animated mt-0">
                <table class="table table-bordered table-hover">
                  <thead class="thead-dark">
                    <tr>
                      <th></th>
                      <th class="text-left">Title</th>
                      <th class="text-left">Active</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                     <tr v-if="!rates.length">
                      <td colspan="4">No record found</td>
                    </tr>

                    <tr v-for="rate in rates">
                      <td class="text-center">
                        <a href="javascript:void(0)" class="btn btn-square btn-primary btn-xs m-t-4" v-on:click="selectedRate(rate)">View</a>
                      </td>
                      <td>
                           <a class="nav-link" href="javascript:void(0)" v-on:click="selectedRate(rate)">{{ rate.language_string.title }} </a> 
                      </td>
                      <td>
                           <a class="nav-link" href="javascript:void(0)">{{ rate.active?'True':'False' }} </a> 
                      </td>
                     
                        <td class="text-center">
                          <a href="javascript:void(0)" class="btn btn-square btn-primary btn-xs m-t-4" v-on:click="editRate(rate)">Edit</a>
                        <a href="javascript:void(0)" class="btn btn-square btn-light btn-xs" v-on:click="deleteRate(rate)">Delete</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="col-md-12" v-if="selectedVariant">
        <div class="card">
          <div class="card-header">
            <div class="row">
               <div class="col-md-6 text-left">
                  <button class="btn btn-pill btn-primary btn-air-primary btn-xs" type="button" data-original-title="btn btn-pill btn-primary btn-air-primary btn-xs" title="" v-on:click="back">Back</button>
              </div>
              <div class="col-md-6 text-right">
                <button class="btn btn-pill btn-primary btn-air-primary btn-xs" type="button" data-original-title="btn btn-pill btn-primary btn-air-primary btn-xs" title="" v-on:click="addNewVariant">Add New Variant</button>
              </div>
            </div>
          </div>
          <div class="collapse show" id="collapseicon" aria-labelledby="collapseicon" data-parent="#accordion">
            <div class="card-body filter-cards-view animate-chk">
              <div class="checkbox-animated mt-0">
                <div class="row">
                  <div class="col-md-8">
                        <h4>{{ selectedRateHeader.language_string.title }}</h4>
                        <table class="table table-bordered table-hover">
                        <thead class="thead-dark">
                          <tr>
                            <th></th>
                            <th class="text-left">Title</th>
                            <th class="text-center" width="15%">Price</th>
                            <th class="text-center" width="15%" nowrap="">Markdown Price</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                          
                          <tr v-if="!selectedRateHeader.details.length">
                             <td colspan="5">No record found</td>
                          </tr>

                          <tr v-for="detail in selectedRateHeader.details">
                            <td class="text-center">
                              <a href="javascript:void(0)" class="btn btn-square btn-primary btn-xs m-t-4" v-on:click="editDetail(detail)">Edit</a>
                            </td>
                            <td>{{ detail.language_string.title }}</td>
                            <td>{{ detail.price }}</td>
                            <td>{{ detail.markdown_price }}</td>
                            <td class="text-center">
                              <a href="javascript:void(0)" class="btn btn-square btn-light btn-xs" v-on:click="deleteDetail(detail)">Delete</a>
                            </td>
                          </tr>
                        </tbody>
                      </table>

                  </div>
                  <div class="col-md-4" v-if="rateFormDisplay">
                    
                      <div class="card">
                      <div class="card-header">
                        <h5>Rate variant <span><small>({{selectedLanguage.country_name}})</small></span></h5>
                      </div>
                      <form class="form theme-form">
                        <div class="card-body">
                          <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Title</label>
                                <input class="form-control"  type="text" placeholder="Title"  v-model="fieldDetail.title">
                              </div>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Price</label>
                                <input class="form-control"  type="number" placeholder=""  v-model="fieldDetail.price">
                              </div>
                            </div>
                          </div>
                           <div class="row">
                            <div class="col">
                              <div class="form-group">
                                <label for="exampleFormControlInput1">Markdown Price</label>
                                <input class="form-control"  type="number" placeholder=""  v-model="fieldDetail.markdown_price">
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card-footer">
                          <a href="javascript:void(0)" class="btn btn-square btn-primary btn-sm btn-block"  v-on:click="addDetailRate">Submit</a>
                          <a href="javascript:void(0)" class="btn btn-square btn-light btn-sm btn-block" v-on:click="cancelDetail">Cancel</a>
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
</template>
<script>
    export default {
       data() {
        return {
          field: {
            active: false,
            title: "",
            description: "",
            sorting: "",
          },
          fieldDetail: {
            title: "",
            price: 0,
            markdown_price: 0,
          },
          countries: {},
          selectedLanguage: {},
          rates: {},
          actionDisplay: true,
          actionAdd: false,
          actionEdit: false,

          selectedVariant: false,
          selectedRateHeader: {},
          rateFormDisplay: false,
          rateDetailActionAdd: true,
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
          axios.get('/api/management/'+ self.attraction.id +'/rates?api_token='+api_token).then(function (response) {
              self.rates = response.data.rates;
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
        addNew: function() {
          this.actionDisplay = false;
          this.actionAdd = true;
          this.actionEdit = true;
        },
        submitRecord: function() {
          var self = this;
          self.loading= true;
          var url = "";
          let formData = new FormData();

          if (self.actionAdd) {
              url = '/api/management/'+self.attraction.id+'/rates/submit?api_token='+api_token;
              formData.append('active', self.field.active);
              formData.append('title', self.field.title);
              formData.append('description', self.field.description);
              formData.append('sorting', self.field.sorting);
          }
          else if (self.actionEdit) {
              url = '/api/management/'+self.field.id+'/rates/update/submit?api_token='+api_token;
              formData.append('active', self.field.active);
              formData.append('title', self.field.title);
              formData.append('description', self.field.description);
              formData.append('sorting', self.field.sorting);
          }
          axios.post(url, formData).then(function (response) {
            if (response.data.status) {
              self.fetchData();
              self.clear();
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
        editRate: function(rate) {
          this.actionAdd = false;
          this.actionEdit = true;
          this.actionDisplay = false;

          this.field = rate;
          this.field.title = rate.language_string.title;
          this.field.description = rate.language_string.description;
        },
        deleteRate: function(rate) {
          var self = this;
          self.loading= true;
          var txt;
          var r = confirm("Are you sure you want to delete this record? \nAll Information related to this record will be deleted as well.");
          if (r == true) {
            axios.post('/api/management/'+rate.id+'/rates/delete/submit?api_token='+api_token).then(function (response) {
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
        addDetailRate: function() {
          var self = this;
          self.loading= true;
          var url = "";
          let formData = new FormData();

          if (self.rateDetailActionAdd)
          {
            url = '/api/management/'+self.selectedRateHeader.id+'/rateDetail/submit?api_token='+api_token;  
          }
          else {
            url = '/api/management/'+self.fieldDetail.id+'/rateDetail/update/submit?api_token='+api_token;
          }
          
          formData.append('title', self.fieldDetail.title);
          formData.append('price', self.fieldDetail.price);
          formData.append('markdown_price', self.fieldDetail.markdown_price);

          axios.post(url, formData).then(function (response) {
            if (response.data.status) {
              self.selectedRateHeader = response.data.rateHeader;
              self.$toasts.success(response.data.message);
              self.cancelDetail();
              self.rateDetailActionAdd = true;
            }
            else {
               self.$toasts.error(response.data.message);
            }
            self.loading = false;
          }).catch(function (error) {
              console.log(error);
          });
        },
        selectedRate: function(rate) {
          this.selectedVariant =  true;
          this.actionDisplay = false
          this.actionAdd = false;
          this.actionEdit = false;
          this.selectedRateHeader = rate;
        },
        back: function(rate) {
          this.selectedVariant =  false;
          this.actionDisplay = true
          this.actionAdd = false;
          this.actionEdit = false;
          this.selectedRateHeader = {};
        },
        clear: function() {
          var self = this;
          self.field = {};
          self.field.active = false;
          self.field.title = "";
          self.field.description = "";
          self.field.sorting = "";
          self.actionDisplay = true;
          self.actionAdd = false;
          self.actionEdit = false;
        },
        addNewVariant: function() {
          this.cancelDetail();
          this.rateDetailActionAdd = true;
          this.rateFormDisplay = true;
        },
        cancel: function() {
          this.clear();
        },
        cancelDetail: function() {
          this.fieldDetail = {};
          this.rateFormDisplay = false;
        },
        editDetail: function(detail) {
          this.rateDetailActionAdd = false;
          this.fieldDetail = detail;
          this.fieldDetail.title = detail.language_string.title;
          this.rateFormDisplay = true;
        },
        deleteDetail: function(detail) {
          var self = this;
          self.loading= true;

          var txt;
          var r = confirm("Are you sure you want to delete this variant?");
          if (r == true) {
            axios.post('/api/management/'+detail.id+'/rateDetail/delete/submit?api_token='+api_token).then(function (response) {
              if (response.data.status) {
                self.selectedRateHeader = response.data.rateHeader;
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
      }
    }
</script>
