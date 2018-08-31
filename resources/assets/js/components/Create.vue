
<template>
<div class="container">
<form>
<div :class="['form-group m-1 p-3', successful ? 'alert-success' : '']">
  <span v-if="successful" class="label label-sucess"> Published! </span>
</div>
 <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
    <span v-if="errors.title" class="label label-danger"> {{ errors.title[0] }} </span>
    <span v-if="errors.body" class="label label-danger"> {{ errors.body[0] }} </span>
    <span v-if="errors.image" class="label label-danger"> {{ errors.image[0] }} </span>
</div>
            
<div class="form-group">
  <input type="title" ref="title" class="form-control" id="title" placeholder="Enter title" required>
</div>

<div class="form-group">
  <textarea class="form-control" ref="body" id="body" placeholder="Enter a body" rows="8" required></textarea>
</div>
            
<div class="custom-file mb-3">
  <input type="file" ref="image" name="image" class="custom-file-input" id="image" required>
    <label class="custom-file-label" >Choose file...</label>
</div>
  <button type="submit" @click.prevent="create" class="btn btn-primary block">Submit</button>
</form>
</div>
</template>


<script>
export default {
  props: {
    userId: {
      type: Number,
      required: true
    }
  },
  data() {
    return {
      error: false,
      successful: false,
      errors: []
    };
  },
  methods: {
    create() {
      const formData = new FormData();
      formData.append("title", this.$refs.title.value);
      formData.append("body", this.$refs.body.value);
      formData.append("user_id", this.userId);
      formData.append("image", this.$refs.image.files[0]);
      axios
        .post("/api/posts", formData)
        .then(response => {
          this.successful = true;
          this.error = false;
          this.errors = [];
        })
        .catch(error => {
          if (!_.isEmpty(error.response)) {
            if ((error.response.status = 422)) {
              this.errors = error.response.data.errors;
              this.successful = false;
              this.error = true;
            }
          }
        });
      this.$refs.title.value = "";
      this.$refs.body.value = "";
    }
  }
};
</script>
