<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12 pb-5">

          <!--Form with header-->

          <form @submit.prevent="create">
              <span style="color: red;" v-if="errors.title">{{ errors.title[0] }}</span>
              <span style="color: green;" v-if="errors.title">{{ messages.body[0] }}</span>
              <div class="card rounded-0">
                  <div class="card-body p-3">

                      <!--Body-->
                      <div class="form-group">
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-user text-dark"></i></div>
                              </div>
                              <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Titulo" v-model="form.title" required>
                          </div>
                      </div>

                      <div class="form-group" >
                          <div class="input-group mb-2">
                              <div class="input-group-prepend">
                                  <div class="input-group-text"><i class="fa fa-comment text-dark"></i></div>
                              </div>
                              <textarea class="form-control" placeholder="Pregunta" v-model="form.body" required></textarea>
                          </div>
                      </div>

                      <div class="text-center">
                          <input type="submit" value="Hacer pregunta" :disabled="disabled" class="btn btn-dark btn-block rounded-0 py-2">
                      </div>
                  </div>

              </div>
          </form>
          <!--Form with header-->


      </div>
    </div>
  </div>
</template>

<script>
export default {
  props:['product', 'user'],
  data() {
    return {
      form: {
     
        title: null,
        body: null,
        product_id:this.product.id,
        user: this.user.name,
        user_id:this.user.id,
        slug: this.product.name,

      },
      categories: {},
      errors: {},
      messages: {}
    };
  },
  mounted(){
    console.log(this.form)
  },
  created() {
    // axios.get("/api/category").then(res => (this.categories = res.data.data));
  },
  methods: {
    create() {
      axios
        .post(`/${this.product.slug}/${this.product.id}/question`, this.form)
        .then(res => this.messages = 'Pregunta enviada')
        .catch(error => (this.errors = error.response.data.errors));

        window.location.reload()
    }
  },
  computed: {
    disabled() {
      return !(this.form.title && this.form.body);
    }
  }
};
</script>

<style>
</style>
