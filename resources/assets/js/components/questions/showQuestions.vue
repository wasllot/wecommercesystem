<template>
  <div class="container">
    <div class="row">
      <div class="col-12">        
        <div v-if="questions">
          <question v-for="(question, index) in questions" :data=question :product=product  :user=user :key=index></question>  
        </div>
        <div class="d-flex align-items-center justify-content-center py-4" v-else>
          <h3 class="text-center">No hay preguntas</h3>
        </div>
      </div>
    </div>
    
    <div class="pt-4">
        <create :product=product :user=user></create>
    </div>

  </div>


</template>

<script>
import question from './question'
export default {  
  props:['product', 'user'],
  data(){
  
    return {
      questions:{},
      
    }
  },
  mounted(){
    
  },
  components:{question},
  created(){
    axios.get(`/${this.product.slug}/${this.product.id}/question`)
    .then(res => this.questions = res.data.data)
    .catch(error => console.log(error.response.data))
  }
}
</script>

<style>

</style>
