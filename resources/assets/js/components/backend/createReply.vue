<template>
  <div>

      <form @submit.prevent="create">
              <div class="card-body p-3">

                  <div class="form-group" >
                      <div class="input-group" style="justify-content: center; display: flex;">
                          <textarea class="form-control" placeholder="Responder pregunta" v-model="form.body" required></textarea>
                      </div>
                  </div>

                  <div class="text-center">
                      <input type="submit" value="Responder" :disabled="disabled" class="btn btn-dark btn-block rounded-0 py-2">
                  </div>
              </div>
      </form>

        <div class="card" v-for="(reply, index) in replies " :key=index style="margin-bottom: 1rem;">
          
          <div class="card-body bg-s">
            {{reply.body}}
          </div>

        </div>
  </div>
</template>

<script>
export default {
  props:['data', 'replies'],
  data() {
    return {
      form: {
        body: null,
        question_id: this.data.id,
        user_id:this.data.user_id,

      },
      errors: {},
      messages: {},
    };
  },
  mounted(){
    console.log(this.replies);
  },
  created() {
    
  },
  methods: {
    create() {
      axios
        .post(`/backend/reply/${this.data.id}`, this.form)
        .then(res => this.messages = 'Repuesta enviada')
        .catch(error => (this.errors = error.response.data.errors));

        window.location.reload()
    },
   
  },
  computed: {
    disabled() {
      return !(this.form.body);
    }
  }
};
</script>

<style>
</style>
