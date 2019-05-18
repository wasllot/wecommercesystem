<template>
  <div>
    <div class="callout callout-info">

        <h4>Tip!</h4>

        <p>Las preguntas de color verdes ya han sido contestadas.</p>

      </div>
      <!-- Default box -->
     
     <div v-for="(data, index) in questions" :key=index>

     	<div v-if="data.user_id == user.id">

		   <div  class="box callout" v-bind:class="[data.reply_count>0 ? 'callout-success' : 'callout-warning']">

		          <div class="box-header with-border">
		          	
		            <h3 class="box-title" style="color: white !important;">{{data.title}}</h3>

		            <div class="box-tools pull-right" style="color: white !important;">
<!-- 		              <button type="button" class="btn btn-box-tool" data-widget="reply" data-toggle="modal" :data-target="'#reply-modal'+data.id">
		                <i style="color: white !important;" class="fa fa-fw fa-reply"></i>
		              </button>    -->         
		              <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Repuesta">
		                <i style="color: white !important;" class="fa fa-minus"></i>
		              </button>

		              <button type="button" class="btn btn-box-tool" data-toggle="modal" :data-target="'#remove-modal'+data.id">
		                <i style="color: white !important;" class="fa fa-times"></i></button>
		            </div>
		          </div>
		          <div class="box-body collapsed-box">
		            {{data.slug}}      

		            <div class="callout" style="padding: 1rem; margin-top: 1rem;">

		              {{data.body}}

		            </div>
		          </div>      

		          <!-- modals -->

<!-- 		        <div class="modal fade" :id="'reply-modal'+data.id">
		          <div class="modal-dialog">
		            <div class="modal-content">
		              <div class="modal-header" style="color: black;">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                  <span aria-hidden="true">&times;</span></button>
		                <h4 class="modal-title">Reponder a {{data.title}}</h4> 
		              </div>
		              <div class="modal-body">
		              
		                  <div class="form-group">

		                    <label>Escribe algo</label>

		                    <textarea style="text-decoration-style: none;" class="form-control" rows="3" placeholder="Enter ..."></textarea>

		                  </div>

		              </div>

		              <div class="modal-footer">
		                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cerrar</button>
		                <button type="button" class="btn btn-primary">Responder</button>
		              </div>
		            </div>
		          </div>
		        </div> -->

		        <div class="modal fade" :id="'remove-modal'+data.id">
		          <div class="modal-dialog">
		            <div class="modal-content" style="color: black;">
		              <div class="modal-header">
		                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                  <span aria-hidden="true">&times;</span></button>
		                <h4 class="modal-title">{{data.title}}</h4>
		              </div>
		              <div class="modal-body">
		                <p>¿Seguro quieres eliminar esta pregunta? no podrás recuperarla</p>
		                <br>
		                <small>{{data.body}}</small>
		              </div>
		              <div class="modal-footer">
		                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Eliminar</button>
		                <button type="button" class="btn btn-danger" data-widget="remove" data-target="#remove-modal" @click="deleteQuestion()">
		              <i class="fa fa-times"></i>Eliminar</button>
		              </div>
		            </div>
		            <!-- /.modal-content -->
		          </div>
		          <!-- /.modal-dialog -->
		        </div>

		      <!--/modals-->

		  </div>
		      <!-- /.box -->

		</div>
     	
     </div>	
  </div>



</template>
<script>
import sentenceUser from './backend/sentenceUser'

	export default {
		components: {sentenceUser},
		props: ['user'],
		data(){
			return {
				errors: {},
				messages: {},
				questions: {}
			} 
		},
		mounted(){

			console.log(this.user.role); 

		},
		created(){
			 axios.get(`/backend/questionsUser`)
				   .then(res => this.questions = res.data.data)
				   .catch(error => console.log(error.response.data))
		}

	}
</script>