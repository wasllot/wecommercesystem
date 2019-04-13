<template>

  <div v-if="data.user_id == user.id" class="container-fluid" style="margin-bottom: 1rem; margin-top: 2rem;" id="questions">
    
    <div class="card"  v-bind:class="[data.reply_count>0 ? 'bg-s' : 'bg-w']">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" width="80" class="img img-fluid" style="border-radius: 50%;" />
                    
                </div>

                <div class="col-md-10">
                    <p class="text-white">
                        <strong> <h4>{{data.title}} en <span style="font-size:2.5rem;">{{data.slug}}</span></h4> - {{data.created_at}}</strong>

                   </p>

                   <h4 class="px-2 float-right"  v-if="data.reply_count>0">Respondida <i class="fa fa-check" aria-hidden="true"></i></h4>

                   <h4 class="px-2 float-right" v-else>Sin responder <i style="color: red;" class="fa fa-exclamation" aria-hidden="true"></i></h4>

                   <div class="clearfix"></div>

                    <h4 class="text-white">{{data.body}}</h4>

                    <p class="text-white">  

                      <a :href="'#deleteModal' + data.id" class="float-right btn btn-danger " data-toggle="modal"><i class="fa fa-times"></i>Eliminar</a>

                   </p>

                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" :id="'deleteModal' + data.id" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="deleteModalLabel">Eliminar pregunta</h4>
          </div>
          <div class="modal-body">
            <h3>¿Seguro desea eliminar "{{data.title}}"?. No podrá recuperar la pregunta.</h3>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="button" class="btn btn-danger" @click="deleteQuestion()">Eliminar</button>
          </div>
        </div>
      </div>
    </div>


  </div>
</template>

<script>

export default {
  name: 'sentenceUser',
  props:['data', 'user'],
  data() {
    return {
      errors: {},
      messages: {},
      replies: {}
      
    }
  },
  mounted(){

    this.getReplies()
  },
  created() {
   // console.log(this.product)
  },
  methods: {
    deleteQuestion() {
      axios
        .get(`/backend/questionUser/delete/${this.data.id}`)
        .then(res => this.messages = 'Pregunta eliminada')
        .catch(error => (this.errors = error.response.data.errors));

        window.location.reload()
    },

     getReplies(){
      axios
        .get(`/backend/repliesUser/${this.data.id}`)
        .then(res => this.replies = res.data.data)
        .catch(error => (this.errors = error.response.data.errors));
    }
  }

}
</script>
