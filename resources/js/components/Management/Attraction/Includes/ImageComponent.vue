<template>
   <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <div class="row">
          <div class="col-md-6">
            <h5>Upload Gallery</h5>
          </div>
          <div class="col-md-6 text-right">
            <button class="btn btn-pill btn-primary btn-air-primary btn-xs" type="button" data-original-title="btn btn-pill btn-primary btn-air-primary btn-xs" title="" v-on:click="uploadImage">Upload Image</button>
          </div>
        </div>
      </div>
      <div class="card-body">

         <div class="row my-gallery gallery" id="aniimated-thumbnials" itemscope="">
          
          <figure class="col-md-3 col-6 img-hover hover-1" itemprop="associatedMedia" itemscope="" v-for="image in objArray">
              <a :href="image.img" itemprop="contentUrl" data-size="1600x950">
                <div>
                    <img :src="image.img" itemprop="thumbnail" alt="Image description" class="img-fluid">
                </div>
              </a>
              <a href="javascript:void(0)" v-on:click="deleteImage(image)">Delete</a>
          </figure>
          
        </div>
        <br><br>
        <form class="dropzone dropzone-primary p-1" id="multiFileUpload" :action="'/api/management/'+attraction.id+'/gallery/upload?api_token='+api_token">
            <input type="hidden" name="_token" :value="csrf">

          <div class="dz-message needsclick"><i class="icon-cloud-up"></i>
            <h6>Drop files here or click to upload.</h6>
            <span class="note needsclick">(Please upload only 500x500 dimension and allows only jpg, jpeg, png image extension.)</span>
          </div>
        </form>

      </div>
    </div>
  </div>
</template>
<script>
    export default {
       data() {
        return {
          selectedLanguage: {},
          objArray: {},
          csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
          api_token: api_token,
          uploadForm: false,
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
          axios.get('/api/management/attraction/'+ self.attraction.id +'/gallery?api_token='+api_token).then(function (response) {
              self.objArray = response.data.record;
          }).catch(function (error) {
              console.log(error);
          });
        },
        deleteImage: function(image) {

          var self = this;
          self.loading= true;

          var txt;
          var r = confirm("Are you sure you want to delete this image?");
          if (r == true) {
            axios.post('/api/management/'+self.attraction.id+'/gallery/'+image.id+'/delete/submit?api_token='+api_token).then(function (response) {
              if (response.data.status) {
                self.fetchData();
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
        uploadImage: function() {
          this.uploadForm = true;
        },
      }
    }
</script>
