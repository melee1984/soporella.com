<template>
<div>
    <div class="card-header">
        <h5>{{ attraction.title }} </h5>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs" id="icon-tab" role="tablist">
          <li class="nav-item"><a class="nav-link active" id="icon-home-tab" data-toggle="tab" href="#icon-home" role="tab" aria-controls="icon-home" aria-selected="true"><i class="icofont icofont-ui-home"></i>General</a></li>
          <li class="nav-item"><a class="nav-link" id="profile-icon-tab" data-toggle="tab" href="#profile-icon" role="tab" aria-controls="profile-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Rate</a></li>
          <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#category" role="tab" aria-controls="category-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Category</a></li>
          <!-- <li class="nav-item"><a class="nav-link" id="promotion-tab" data-toggle="tab" href="#promotion" role="tab" aria-controls="profile-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Promotion</a></li> -->
          <li class="nav-item"><a class="nav-link" id="contact-icon-tab" data-toggle="tab" href="#contact-icon" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Other Information</a></li>

          <li class="nav-item"><a class="nav-link" id="gallery-tab" data-toggle="tab" href="#gallery" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Gallery</a></li>
          <li class="nav-item"><a class="nav-link" id="up-selling-tab" data-toggle="tab" href="#up-selling" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Up Selling</a></li>
          <li class="nav-item"><a class="nav-link" id="related-item-tab" data-toggle="tab" href="#related-item" role="tab" aria-controls="contact-icon" aria-selected="false"><i class="icofont icofont-contacts"></i>Related Item</a></li>
        </ul>
        <div class="tab-content" id="icon-tabContent">
          <div class="tab-pane fade show active" id="icon-home" role="tabpanel" aria-labelledby="icon-home-tab">
            <p class="mb-0 m-t-30">
              <!-- General Information --> 
              <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  <h5>General</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-8 col-sm-8">
                        <div class="row">
                           <div class="form-group col-12">
                             <label class="d-block" for="active">
                              <input class="checkbox_animated" id="active" name="active" value="1" type="checkbox" data-original-title="" title="" v-model="field.active" > Active
                            </label>
                          </div>
                          <div class="form-group col-12">
                            <label for="title">Title</label>
                            <input class="form-control" id="title" type="email" data-original-title="" title="" v-model="attraction.title">
                          </div>
                          <div class="form-group col-12">
                            <label for="description">Description asd </label>
                            <textarea class="form-control" id="description" data-original-title="" title="" rows="3" v-model="field.description"></textarea>

                          </div>

                           <div class="form-group col-12">
                            <label for="description">Emirate</label>
                            <select  v-model="field.emirate" class="form-control">
                              <option value="">Select Emirate</option>
                              <option :value="location.id" v-for="location in locations">
                                  {{ location.title }}
                              </option>
                            </select>  
                          </div>
                         
                        </div>

                    </div>
                     <div class="col-lg-4 col-sm-4">
                        <label>Primary Photo <span v-if="field.img"><a href="">Delete Photo</a></span></label>
                        <img :src="field.photo" class="img-fluid"> 
                        <p></p>
                        <div class="form-group col-12 m-0 p-0">
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="file" @change="onFileSelected">
                              <label class="custom-file-label" for="img">Choose file</label>
                            </div>
                             <div class="input-group-append">
                              <span class="input-group-text" >
                                <a href="javascript:void(0)" v-on:click="onUploadImage" style="font-size: 14px;"><small>{{ uploadStatus }}</small></a>
                              </span>
                            </div>
                          </div>
                        </div>
                     </div>
                    </div>
                  </div>
                   <div class="card-footer">
                      <a href="javascript:void(0)" class="btn btn-sm btn-primary" v-on:click="update">Submit</a> 
                      <a href="/dashboard/attraction" class="btn btn-sm btn-light">Cancel</a> 
                   </div>
                </div>
              </div>
              <!-- End of General Information here  --> 
            </p>
          </div>
          <div class="tab-pane fade" id="profile-icon" role="tabpanel" aria-labelledby="profile-icon-tab">
            <p class="mb-0 m-t-30">
                <rate-display :attraction=attraction></rate-display>
            </p>
          </div>
          <div class="tab-pane fade" id="contact-icon" role="tabpanel" aria-labelledby="contact-icon-tab">
            <p class="mb-0 m-t-30">
                  <!-- Form Here --> 
                  <div class="card">
                <div class="card-header">
                  <h5>Other Information</h5>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-12 col-sm-12">
                      <div class="row">
                         <div class="form-group col-12">
                            <label for="description">Redemption</label>
                             <wysiwyg v-model="field.redemption"/>
                          </div>
                          <div class="form-group col-12">
                            <label for="description">Availability</label>
                              <wysiwyg v-model="field.availability"/>
                          </div>
                           <div class="form-group col-12">
                            <label for="description">About</label>
                              <wysiwyg v-model="field.about"/>
                          </div>
                          <div class="form-group col-12">
                            <label for="description">Youtube video</label>
                            <input type="text" class="form-control" v-model="field.video" />
                            <span class="text-muted">This will embed the youtube url into the attraction when video</span>
                          </div>

                          <div class="form-group col-12">
                            <label for="description">Special Announcement</label>
                            <wysiwyg v-model="field.special_annoucement"/>
                            </div>
                        </div>
                    </div>
                     <div class="col-lg-4 col-sm-4">
                       
                     </div>
                    </div>
                  </div>
                   <div class="card-footer">
                      <a href="javascript:void(0)" class="btn btn-sm btn-primary" v-on:click="update">Submit</a> 
                      <a href="/dashboard/attraction" class="btn btn-sm btn-light">Cancel</a> 
                   </div>
                </div>
                <!-- End form here -->
            </p>
          </div>
           <!-- <div class="tab-pane fade" id="promotion" role="tabpanel" aria-labelledby="promotion-tab">
            <p class="mb-0 m-t-30">
                Active Promotion Here 
            </p>
          </div> -->

          <div class="tab-pane fade" id="category" role="tabpanel" aria-labelledby="category-tab">
            <p class="mb-0 m-t-30">
                <category-display  :attraction=attraction></category-display>
            </p>
          </div>
          <div class="tab-pane fade" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
            <p class="mb-0 m-t-30">
                <image-display :attraction=attraction></image-display>
            </p>
          </div>
            <div class="tab-pane fade" id="up-selling" role="tabpanel" aria-labelledby="up-selling-tab">
            <p class="mb-0 m-t-30">
                <upsell-display :attraction=attraction></upsell-display>
            </p>
          </div>
            <div class="tab-pane fade" id="related-item" role="tabpanel" aria-labelledby="related-item-tab">
            <p class="mb-0 m-t-30">
                <related-display :attraction=attraction></related-display>
            </p>
          </div>
        </div>
    </div>
</div>

</template>

<script>
    
    import rateComponent from '../../Management/Attraction/Includes/RateComponent.vue';
    import categoryComponent from '../../Management/Attraction/Includes/CategoryComponent.vue';
    import imageComponent from '../../Management/Attraction/Includes/ImageComponent.vue';
    import upSellComponent from '../../Management/Attraction/Includes/UpSellComponent.vue';
    import relatedComponent from '../../Management/Attraction/Includes/RelatedComponent.vue';

    export default {
      components: {
          'rate-display': rateComponent,
          'category-display': categoryComponent,
          'image-display': imageComponent,
          'upsell-display': upSellComponent,
          'related-display': relatedComponent,
      },
      data() {
        return {
          field: {
            title: "",
            description: "",
            availability: "",
            redemption: "",
            about: "",
            active: 0,
            photo: "",
            special_annoucement: "<p></p>",
            emirate: "",
          },
          plugins: ['advlist autolink lists link image charmap print preview hr anchor pagebreak', 'insertdatetime media nonbreaking save table contextmenu directionality','template paste textcolor colorpicker textpattern imagetools toc help emoticons hr codesample'],
          fileImage: null,
          uploadStatus: 'Upload',
          lang: JSON.parse(localStorage.selectedLanguage).country_code,
        }
      },
      props:['attraction', 'locations'],
      computed: {
        // lang: {
        //     get: function () {
        //       return JSON.parse(localStorage.selectedLanguage).country_code;
        //     },
        // },
      },
      mounted() {

        this.field  = this.attraction;

        // this.field.title = this.attraction.title;
        this.field.description = this.attraction.language_string[this.lang].description;
        this.field.availability = this.attraction.language_string[this.lang].availability;
        this.field.redemption = this.attraction.language_string[this.lang].redemption;
        this.field.about = this.attraction.language_string[this.lang].about;
        this.field.special_annoucement = this.attraction.special_annoucement;
        this.field.emirate = this.attraction.location_id;

        // this.field.active = this.attraction.active;
        // this.field.img = this.attraction.photo;
      },
      created() {

      },
      methods: {
        onFileSelected: function(e) {
            this.fileImage = e.target.files[0];
        },
        onUploadImage: function() {
              var self = this;
              const fd = new FormData();
              fd.append('file', this.fileImage, this.fileImage.name);

              self.uploadStatus = "Please wait...";
              axios.post('/api/management/'+self.attraction.id+'/upload/submit?api_token='+api_token, fd, {
                onUploadImage: uploadEvent => {
                  this.uploadStatus = "Upload" + Math.round(uploadEvent.loaded / uploadEvent.total * 100) + "%"
                }
              }).then(function (response) {
                if (response.data.status) {
                  self.$toasts.success(response.data.message);
                  self.field.photo = response.data.img;
                  self.uploadStatus = "Upload";
                }
                else   {
                  self.$toasts.info(response.data.message);
                  self.uploadStatus = "Upload";
                }
              }).catch(function (error) {
                self.$toasts.error(error.response.data.errors['file'][0]);
                this.uploadStatus = "Upload";
              });
        },
        update: function() {
          var self = this;
          axios.post('/api/management/'+self.attraction.id+'/attraction/submit?api_token='+api_token, {
              title: self.field.title,
              description: self.field.description,
              availability: self.field.availability,
              redemption: self.field.redemption,
              about: self.field.about,
              active: self.field.active,
              video: self.field.video,
              location_id: self.field.emirate,
              special_annoucement: self.field.special_annoucement,
              
            }).then(function (response) {
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
      }
    }
</script>
