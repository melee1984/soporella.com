<template>
    <div class="container">

      <div class="com-md-12 text-center p-50" v-if="loading">
        <img src="/images/ajax-loader.gif" alt=""><p class="p-10">Please wait..</p>
      </div>
        <div  v-if="!loading" >
          <div class="row">
            <div class="col-lg-12">
              <h1><span class="red"><span>{{ totalQuantity }}</span></span> {{messages.TICKET_IN_YOUR_CART}}</h1>
            </div>
          </div>
          <div class="alert alert-info" role="alert" v-if="totalQuantity==0" >
            <h4 class="alert-heading">Hello There,</h4>
            <p>Your cart is currently empty</p>
            <hr>
          </div>
          <div class="row m-t-15 p-40 border-box" v-for="item in cart.details">
              <div class="col-md-2 col-sm-12">
                   <a :href="item.attraction.url" :title="item.attraction.title">
                    <img :src="item.attraction.photo" class="img-responsive"> 
                  </a>
                  <br>
                  <a href="javascript:void(0)" v-on:click="removeItem(item)" title="Delete Item">
                      <span class="material-icons">delete_forever</span>
                  </a>
              </div>
              <div class="col-md-3 col-sm-6">
                    <h3 class="">{{ item.attraction.title }}</h3>
                    {{ item.attractiondetails.rate_header.title }}
              </div>
              <div class="col-md-5 col-sm-6">
                   <div v-for="variance in item.variance_converted" class="row">
                           <div class="col-md-4 col-xs-6"><strong>{{ variance.title }}</strong></div>
                           <div class="col-md-4 col-xs-6 text-left">{{ variance.price }} </div>
                            <div class="col-md-4">
                              <select class="form-control" v-model="variance.qty" @change="updateVariant(variance, item.id)">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                              </select>
                            </div>
                         <div class="col-md-12">&nbsp;</div>
                    </div>
              </div>
              <div class="col-md-2 col-sm-12 text-center"><strong>{{ item.variance_total }} {{ item.currency }}</strong></div>
          </div>  
        </div>

        <div class="border-box" v-if="totalQuantity<0">
            <div class="row">
              <div class="col-md-6"></div>
              <div class="col-md-6">
                  <div v-if="refreshSummaryLoading" class="text-center p-20"> 
                       <img src="/images/ajax-loader.gif" alt="">
                  </div>
                  <table class="table" cellpadding="2" cellspacing="2" v-if="!refreshSummaryLoading">
                    <tr class="basket-summary-total">
                      <td>{{ messages.CART_SUB_TOTAL }}</td>
                      <td>{{  summary.subTotal }}</td>
                    </tr>
                    <tr>
                    <tr class="basket-summary-total">
                      <td>Discount</td>
                      <td>{{ summary.discount }}</td>
                    </tr>
                    <tr>
                      <td colspan="2">
                        <hr>
                      </td>
                    </tr>
                    <tr class="basket-summary-total-1">
                      <td>
                      {{ messages.LABEL_TOTAL }} (tax included)</td>
                      <td>{{  summary.total }}</td>
                    </tr>
                  </table> 
              </div>
            </div>
        </div>

        <br>
        <div class="row" v-if="totalQuantity!=0">
            <div class="col-md-6 col-lg-6 col-xs-12 text-left">
                <a href="/" class="btn btn-secondary sw-btn-next">{{ messages.CONTINUE_SHOPPING }}</a>
            </div>
            <div class="col-md-6 col-lg-6 col-xs-12 text-right">
                <a href="javascript:void(0)" class="btn btn-secondary sw-btn-next" v-on:click="proceed">{{ messages.PROCEED_TO_PRAYMENT }}</a>
            </div>
        </div>

        <button type="button" data-toggle="modal" data-target="#popLogin" id="btnLogin" class="hide"></button>

        <!-- Modal -->
        <div class="modal fade" id="popLogin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header p-10">
                <div class="col-md-6">
                  <h3 class="modal-title">{{ messages.LOGIN_POPUP_LABEL_LOGIN }}</h3>
                </div>
                <div class="col-md-6">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
              </div>
              </div>
              <div v-if="formLogin.loading" v-bind:class="'alert '+formLogin.errorDisplay">{{ formLogin.message }}</div>
              <div class="modal-body">
                    <div class="form-group">
                      <label for="username">{{ messages.LABEL_EMAIL_ADRESS }}</label>
                      <input type="email" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter email-address" v-model="formLogin.username">
                    </div>
                    <div class="form-group">
                      <label for="password">{{ messages.PASSWORD }}</label>
                      <input type="password" class="form-control" id="password" placeholder="Password" v-model="formLogin.password">
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="remember" value="1" v-model="formLogin.check">
                      <label class="form-check-label" for="remember">Remember me</label>
                    </div>
                    <button type="button" class="btn btn-secondary sw-btn-next btn-block" v-on:click="login">{{ messages.BTN_SUBMIT }}</button>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        <!-- Login --> 

    </div>
</template>

<script>
    export default {
      data() {
        return {
            cart: {},
            totalQuantity: 0,
            summary: {},
            loading: true,
            formLogin: {
              loading: false,
              errorDisplay: "alert-info",
              message: "Validating login, please wait...",
              username: "",
              password: "",
              remember: "",
            },
            refreshSummaryLoading: true,
            messages: this.trans.messages,
        }
      },
      mounted() {
        this.fetchData();
      },
      created() {
        
      },
      methods: {
        proceed: function() {
          if (!isLogged) {
           $('#btnLogin').click();
            return;
          }
          else {
            this.redirect('/checkout');
          }
        },
        removeItem: function(item) {
            var self = this;
            self.refreshSummaryLoading = true;
            axios.post('/api/cart/item/'+item.id+'/delete').then(function (response) {
              if (response.data.status) {
                  self.fetchData();
              }
              self.refreshSummaryLoading = false;
            }).catch(function (error) {
              
            });
        },
        fetchData: function() {
          var self = this;

          self.refreshSummaryLoading = true;
          self.loading = true;  

          axios.get('/api/cart').then(function (response) {
            if (response.data.status) {
              self.cart = response.data.cart;
              self.summary = response.data.summary;
              self.totalQuantity = response.data.summary.totalQty;
            }
            self.refreshSummaryLoading = false;
            self.loading = false;  
          }).catch(function (error) {
              console.log(error);
          });
        },
        login: function() {
          var self = this;
          
          self.formLogin.loading = true;
          self.formLogin.message = "Validating login, please wait...";
          self.formLogin.errorDisplay = "alert-info";
 
          axios.post('/api/login/submit', {
            email: this.formLogin.username,
            password: this.formLogin.password,
            remember: this.formLogin.remember,
            page: page_url,
          }).then(function (response) {
            
            if (response.data.status) {
              self.formLogin.loading = false;
              self.formLogin.errorDisplay = response.data.errorDisplay;  
              self.formLogin.message = response.data.message;
              self.redirect(response.data.redirectURL);
            }
            else {
              self.formLogin.loading = true;
              self.formLogin.errorDisplay = response.data.errorDisplay;
              self.formLogin.message = response.data.message;
            } 

          }).catch(function (error) {
              console.log(error);
          });
        },
        validateForm: function () 
        {
          var self = this;
          var i;

          this.errors = [];
        
          $('#username').removeClass('border-danger ding');
          $('#password').removeClass('border-danger ding');

          if (!this.formLogin.username) {
            $('#username').addClass('border-danger ding');
            return false;
          }

          if (!this.formLogin.password) {
            $('#password').addClass('border-danger ding');
            return false;
          }
          
          return true;
          
        },
        redirect: function(url) {
              window.location.href = url;
        },
        updateVariant: function(variance_details, detail) {

          var self = this;
          self.refreshSummaryLoading = true;
          axios.post('/api/cart/item/'+detail+'/update', variance_details ).then(function (response) {
            if (response.data.status) {
               self.summary = response.data.summary;
                self.totalQuantity = response.data.summary.totalQty;
            }
            self.refreshSummaryLoading = false;
          }).catch(function (error) {
            
          });

        }

      }

    }
</script>
