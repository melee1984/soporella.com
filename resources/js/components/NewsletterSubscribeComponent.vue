<template>
    <div class="col-md-12">
        <form action="/newsletter/submit" id="formnewsletter" class="form-inline" role="form">
            <div class="form-group">
              <input type="email" class="form-control" name="email" v-model="field.email" :placeholder="messages.EMAIL_ADDRESS">
            </div>
            <div class="form-group" id="cap_send">
              <input type="button" class="buy" :value="messages.LABEL_SUBSCRIBE" v-on:click="submit">
            </div>
            <p class="newsletter-text">{{ messages.SUBSCRIBE_MESSAGE }}</p>
         </form>
    </div>
</template>
<script>
    export default {
      data() {
        return {
          field: {
            email: "",
          },
            messages: this.trans.messages,
        }
      },
      methods: {
        submit: function(obj) {
              var self = this;
              axios.post('/api/newsletter/submit', {
                email: self.field.email,
              }).then(function (response) {
                if (response.data.status) {
                  self.$toasts.success(response.data.message);
                }
                else {
                   self.$toasts.error(response.data.message);
                }
              }).catch(function (error) {
                  self.$toasts.error(error.response.data.errors.email[0]);
              });
        },
       
      }
    }
</script>
