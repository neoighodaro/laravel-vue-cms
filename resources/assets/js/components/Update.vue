
<template>
<div class="container">
<form>
<div :class="['form-group m-1 p-3', successful ? 'alert-success' : '']">
  <span v-if="successful" class="label label-sucess"> Updated! </span>
</div>

 <div :class="['form-group m-1 p-3', error ? 'alert-danger' : '']">
    <span v-if="errors.title" class="label label-danger"> {{ errors.title[0] }} </span>
    <span v-if="errors.body" class="label label-danger"> {{ errors.body[0] }} </span>
</div>


<div class="form-group">
  <input type="title" ref="title" class="form-control" id="title" placeholder="Enter title" required>
</div>

<div class="form-group">
  <textarea class="form-control" ref="body" id="body" placeholder="Enter a body" rows="8" required></textarea>
</div>
  <button type="submit" @click.prevent="update" class="btn btn-primary block">Submit</button>
</form>
</div>
</template>


<script>
export default {
  mounted() {
    this.getPost();
  },
  props: {
    postId: {
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
    update() {
      let title = this.$refs.title.value;
      let body = this.$refs.body.value;
      axios
        .put('/api/posts/' + this.postId, { title, body })
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
    },
    getPost() {
      axios.get('/api/posts/' + this.postId).then(response => {
        this.$refs.title.value = response.data.data.title;
        this.$refs.body.value = response.data.data.body;
      });
    }
  }
};
</script>
