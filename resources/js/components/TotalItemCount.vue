<template>
  <span>
    <a href="/shopping-cart/basket"> {{ messages.HEADER_LABEL_MY_TICKET }} (<span> {{ item_count }} </span>)</a>
  </span>
 </template>
<script>
    export default {
      data() {
        return {
            item_count: 0,
             messages: this.trans.messages,
        }
      },
      mounted() {
        this.fetchData();
      },
      created() {
        Event.$on('refreshBasket', () => {
           this.fetchData();
        });
      },
      methods: {
        fetchData: function() {
          var self = this;
          axios.get('/api/cart/summary').then(function (response) {
            self.item_count = response.data.summary.totalQty;
          })
          .catch(function (error) {
              console.log(error);
          });
        },
        setItemCount: function(cartItemCount) {
          this.item_count = cartItemCount;
        },
        addCart: function(){
          this.$toasts.success('This is the message');
        }
       
      }

    }
</script>


