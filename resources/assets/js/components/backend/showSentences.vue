<template>
 <div class="container">
    <div class="row">
      <div class="col-12">        
        <div v-if="questions">
          <sentence v-for="question in questions" :data=question></sentence>  
        </div>
        <div class="d-flex align-items-center justify-content-center py-4" v-else>
          <h3 class="text-center">No hay preguntas</h3>
        </div>
      </div>
    </div>
  </div>

</template>
<script>
import sentence from './sentence'

	export default {
		components: {sentence},
		data(){
			return {
				errors: {},
				messages: {},
				questions: {},
				
			} 
		},
		mounted(){
			// axios.get("/isAdmin").then(res => (this.isAdmin = res.data));
		},
		created(){
			 axios.get(`/backend/question`)
				   .then(res => this.questions = res.data.data)
				   .catch(error => console.log(error.response.data))
		}

	}
</script>