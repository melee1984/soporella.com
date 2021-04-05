<template>
  <div class="row checkout">
    <div class="com-md-12 text-center p-50" v-if="loading">
      <img src="images/ajax-loader.gif" alt=""><p class="p-10">Please wait..</p>
    </div>
    <div class="col-md-8" v-if="!loading">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Personal Information</h3>
        </div>
        <div class="panel-body">
          <div class="row">
            <div class="col-md-11">
              <strong>{{ userArray.firstname }} {{ userArray.lastname }}</strong><br>
               {{ userArray.email }} <br>
              {{ userArray.mobile }}

            </div>
            <div class="col-md-1 text-center">
              <a href="javascript:void()" title="Edit Information"><span class="material-icons">edit</span></a>
            </div>
          </div>
        </div>
      </div>
      <div class="panel panel-default payment">
        <div class="panel-heading">
          <h3 class="panel-title">Payment Gateway</h3>
        </div>
        <div class="panel-body">
            
          <div class="row">
            <div class="col-sm-6 col-md-4" v-for="payment in paymentGatewayArray">
              <div :id="'payment_'+payment.id" class="thumbnail" v-bind:class="{selected: cartArray.payment_id==payment.id}" v-on:click="selectPaymentGateway(payment.id)">
                <div class="caption">
                  <p><strong>{{payment.title}}</strong></p>
                  <span class="material-icons">{{ payment.class }}</span>
                  <p>{{payment.description}}</p>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="col-md-4" id="checkout-basket" v-if="!loading">
      <div class="panel panel-default" v-if="cartArray">
        <div class="panel-heading">
          <h3 class="panel-title">Your Basket</h3>
        </div>
        <div class="panel-body">
          <div v-for="detail in cartArray.details">
            <span v-for="variance in detail.variance_converted">
              <div class="row">
              <div class="col-md-6"><strong>{{ variance.qty }} x </strong>{{ detail.attraction.title }} - {{ variance.title }} </div>
              <div class="col-md-3">{{ variance.price }}</div>
              <div class="col-md-3">{{ variance.sub_total }}</div>
            </div>  
             <hr>
            </span>
          </div>
          <p class="text-right"><a href="/shopping-cart/basket" class="">View cart</a></p>
        </div>
      </div>
      
      <hr>
      <p>By making this purchase you agree to our <a href="/terms-and-condition">terms and conditions</a>.</p>
      <a href="javascript:void(0)" class="btn btn-primary btn-block buy btn-soporella" v-on:click="proceed">Proceed to Checkout</a>
    </div>
  </div>  


</template>

<script>
    export default {
      data() {
        return {
          paymentGatewayArray: {},
          userArray: {},
          cartArray: {},
          loading: false,
        }
      },
      mounted() {
         this.fetchData();
      },
      computed: {
            
      },
      methods: {
        fetchData: function() {
          var self = this;

          self.loading = true;

          axios.get('/api/checkout?api_token='+api_token).then(function (response) {
            if (response.data.status) {
              self.paymentGatewayArray = response.data.paymentGatewayList;
              self.userArray = response.data.user;
              self.cartArray = response.data.cart;
          }
            self.loading = false;

          }).catch(function (error) {
              console.log(error);
          });
        },
        proceed: function() {
          var self = this;
          self.loading= true;
          axios.post('/api/checkout/submit?api_token='+api_token).then(function (response) {
            if (response.data.status) {
                self.redirect(response.data.redirectURL);  
            }
            else {

               this.$toasts.error(response.data.message);

            }

            self.loading = false;

          }).catch(function (error) {
              console.log(error);
          });

        },
        selectPaymentGateway: function(selectedId) {
          var self = this;
          self.loading= true;
          axios.post('/api/checkout/payment/submit?api_token='+api_token, {
            payment_id: selectedId
          }).then(function (response) {
            if (response.data.status) {
                $('.payment .thumbnail').removeClass('selected');
                $('#payment_'+selectedId).addClass('selected');
            }
            else {
               this.$toasts.error(response.data.message);
            }
            self.loading = false;
          }).catch(function (error) {
              this.$toasts.error(error);
          });

          self.loading= false;
        },
        redirect: function(url) {
              window.location.href = url;
        },
      }

    }
</script>


