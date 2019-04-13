<template>
 <div class="container">
    <div class="row">
      <div class="col-12">        
        <div v-if="questions">
          <sentenceUser v-for="(question, index) in questions" v-if="user.id == question.user_id" :key=index :data=question :user=user></sentenceUser>  
        </div>
        <div class="d-flex align-items-center justify-content-center py-4" v-else>
          <h3 class="text-center">No hay preguntas</h3>
        </div>
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

		},
		created(){
			 axios.get(`/backend/questionsUser`)
				   .then(res => this.questions = res.data.data)
				   .catch(error => console.log(error.response.data))
		}

	}
</script>