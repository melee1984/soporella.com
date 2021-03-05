<template>
  <span>
    <a href="shopping-cart/basket"> My Tickets (<span id="tickets_no"> {{ item_count }} </span>)
    </a>
  </span>
 </template>

<script>
    export default {
      data() {
        return {
            item_count: 0,
        }
      },
      mounted() {
        console.log('Mounted Basket');
        // this.fetchData();
      },
      created() {
        Event.$on('ItemCount', (cartItemCount) => {
           this.setItemCount(cartItemCount);
        });
      },
      methods: {
        
        setItemCount: function(cartItemCount) {
          this.item_count = cartItemCount;
        },

        fetchData: function() {
          var self = this;
          axios.get('/api/cart/summary').then(function (response) {
            self.item_count = response.data.summary.qty;
          })
          .catch(function (error) {
              console.log(error);
          });
        },
      }

    }
</script>


