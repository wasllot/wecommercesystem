<template>
  <div class="container">
    <div class="row">
      <div class="col-12">        
        <div v-if="questions">
          <publicQuestion v-for="(question, index) in questions" :data=question :product=product  :key=index></publicQuestion>  
        </div>
        <div class="d-flex align-items-center justify-content-center py-4" v-else>
          <h3 class="text-center">No hay preguntas</h3>
        </div>
      </div>
    </div>

  </div>


</template>

<script>
import publicQuestion from './publicQuestion'
export default {  
  props:['product'],
  data(){
  
    return {
      questions:{},
      
    }
  },
  mounted(){
    
  },
  components:{publicQuestion},
  created(){
    axios.get(`/${this.product.slug}/${this.product.id}/question`)
    .then(res => this.questions = res.data.data)
    .catch(error => console.log(error.response.data))
  }
}
</script>

<style>

</style>
