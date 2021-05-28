<template>
    <div>
        <div class="card-body">
          <div class="row">
            <div class="col">
              <div class="form-group mb-4">
                <div class="row">
                  <div class="col">
                      <label class="d-block" for="active">
                        <input class="checkbox_animated" value="1" type="checkbox"  v-model="field.active"> Active
                      </label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label for="title">Title</label>
                <input class="form-control" type="text" placeholder="Attraction Title" v-model="field.title">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group mb-4">
                <label for="description">Description</label>
                <wysiwyg name="description" v-model="field.description"></wysiwyg>
              </div>
            </div>
          </div>

        </div>
        <div class="card-footer">
          <button class="btn btn-primary" type="submit" v-on:click="submit">Submit</button>
          <a href="/dashboard/attraction" class="btn btn-light">Cancel</a>
        </div>
    </div>
</template>

<script>
    
   
    export default {
      components: {},
      data() {
        return {
          field: {
            title: "",
            description: "",
            active: 0,
          },
        }
      },
      computed: {
      },
      mounted() {
      },
      created() {
      },
      methods: {
        submit: function() {
          var self = this;
          axios.post('/api/dashboard/attraction/add?api_token='+api_token, {
              title: self.field.title,
              description: self.field.description,
              active: self.field.active,
            }).then(function (response) {
              if (response.data.status) {
					window.location.href =response.data.redirect;
					self.$toasts.success(response.data.message);
              }
              else {
                 self.$toasts.error(response.data.message);
              }
          }).catch(function (error) {
              self.$toasts.error(error.response.data.errors['file'][0]);
          });

        },
      }
    }
</script>
