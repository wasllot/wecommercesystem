<template>

<!--   <div class="container-fluid" style="margin-bottom: 1rem; margin-top: 2rem;" id="questions">
    
    <div class="card"  v-bind:class="[data.reply_count>0 ? 'bg-s' : 'bg-w']">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" width="80" class="img img-fluid" style="border-radius: 50%;" />
                    
                </div>

                <div class="col-md-10">
                    <p class="text-white">
                        <strong> <h4>{{data.title}} en <span style="font-size:2.5rem;">{{data.slug}}</span></h4> por {{data.user}} - {{data.created_at}}</strong>

                   </p>

                   <h4 class="px-2 float-right"  v-if="data.reply_count>0">Respondida <i class="fa fa-check" aria-hidden="true"></i></h4>

                   <h4 class="px-2 float-right" v-else>Sin responder <i style="color: red;" class="fa fa-exclamation" aria-hidden="true"></i></h4>

                   <div class="clearfix"></div>

                    <h4 class="text-white">{{data.body}}</h4>

                    <p class="text-white">
                      <a :href="'#replyModal' + data.id" class="float-right btn btn-primary " data-toggle="modal"><i class="fa fa-reply"></i>Responder</a>   

                      <a :href="'#deleteModal' + data.id" class="float-right btn btn-danger " data-toggle="modal"><i class="fa fa-times"></i>Eliminar</a>

                   </p>

                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" :id="'replyModal' + data.id" tabindex="-1" role="dialog" aria-labelledby="replyModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="replyModalLabel">Responder a {{data.title}}</h4>
          </div>
          <div class="modal-body">

            <createReply :data=data :replies=replies></createReply>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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


  </div> -->

   <div  class="box callout" v-bind:class="[data.reply_count>0 ? 'callout-success' : 'callout-warning']">

        <div class="box-header with-border">
              
              <h3 class="box-title" style="color: white !important;">{{data.title}}</h3>

              <div class="box-tools pull-right" style="color: white !important;">

               <button type="button" class="btn btn-box-tool" data-widget="reply" data-toggle="modal" :data-target="'#reply-modal'+data.id">
                  <i style="color: white !important;" class="fa fa-fw fa-reply"></i>
                </button>            

                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Repuesta">
                  <i style="color: white !important;" class="fa fa-minus"></i>
                </button>

                <button type="button" class="btn btn-box-tool" data-toggle="modal" :data-target="'#remove-modal'+data.id">
                  <i style="color: white !important;" class="fa fa-times"></i>
                </button>

              </div>

        </div>

        <div class="box-body collapsed-box">

              {{data.slug}}      

              <div class="callout" style="padding: 1rem; margin-top: 1rem;">

                {{data.body}}

              </div>

        </div>     

        <div class="modal fade" :id="'reply-modal'+data.id">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header" style="color: black;">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">Reponder a {{data.title}}</h4> 
                </div>
                <div class="modal-body">
                


                    <createReply :data=data :replies=replies></createReply>


                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary" @click="">Responder</button>
                </div>
              </div>
            </div>
        </div>

        <div class="modal fade" :id="'remove-modal'+data.id">
            <div class="modal-dialog">
              <div class="modal-content" style="color: black;">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title">{{data.title}}</h4>
                </div>
                <div class="modal-body">
                  <p>¿Seguro desea eliminar "{{data.title}}"? No podrá recuperar la pregunta.</p>
                  <br>
                  <small>{{data.body}}</small>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-danger" data-widget="remove" data-target="#remove-modal" @click="deleteQuestion()">
                <i class="fa fa-times"></i>Eliminar</button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

    </div>

</template>

<script>

import createReply from './createReply'

export default {
  components: {createReply},
  name: 'sentence',
  props:['data'],
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
        .get(`/backend/question/delete/${this.data.id}`)
        .then(res => this.messages = 'Pregunta eliminada')
        .catch(error => (this.errors = error.response.data.errors));

        window.location.reload()
    },

     getReplies(){
      axios
        .get(`/backend/reply/${this.data.id}`)
        .then(res => this.replies = res.data.data)
        .catch(error => (this.errors = error.response.data.errors));
    }
  }

}
</script>
