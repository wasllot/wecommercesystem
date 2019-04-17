<template>
 <div class="container">

    <div class="row">

      <div class="col-12 p-4 ">

        <div id="custom-search-input">

               <div class="input-group col-md-12">

                  <input type="text" class="search-query form-control" v-model="search" placeholder="slug o titulo" />

                  <button class="btn btn-danger" type="button">

                  <span class=" glyphicon glyphicon-search"></span>

                  </button>

               </div>

            </div>
      </div>
      <div class="col-12">        
        <div v-if="questions">
          <sentence v-for="(question, index) in questionsFiltered" :data=question :key=index></sentence>  
        </div>
        <div class="d-flex align-items-center justify-content-center py-4" v-else>
          <h3 class="text-center">No hay preguntas</h3>
        </div>
      </div>
    </div>
  </div>

</template>
<script>
import sentence from './backend/sentence'

    export default {
        components: {sentence},
        data(){
            return {
                errors: {},
                messages: {},
                questions: {},
                search: ''
            } 
        },
        computed: {
          questionsFiltered(){
              return this.questions.filter(question => {
                return question.slug.toLowerCase().includes(this.search.toLowerCase()) || question.title.toLowerCase().includes(this.search.toLowerCase())
              })
          }
        },
        mounted(){

        },
        created(){
             axios.get(`/backend/question`)
                   .then(res => this.questions = res.data.data)
                   .catch(error => console.log(error.response.data))
        }

    }
</script>