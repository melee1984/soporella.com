<template>
  <span>
    <a href="#" v-on:click="addCart"> My Tickets (<span id="tickets_no"> {{ item_count }} </span>)
    </a>
  </span>
 </template>

<script>
    export default {
      data() {
        return {
            item_count: 1,
        }
      },
      mounted() {
        console.log('Mounted Basket Basket Count');

        

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
        addCart: function(){
          this.$toasts.success('This is the message');
        }
       
      }

    }
</script>


