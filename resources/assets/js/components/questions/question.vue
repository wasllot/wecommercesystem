<template>
  <div class="container" v-if="data.product_id==product.id">
    
    <div class="card mb-2">
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <img src="https://image.ibb.co/jw55Ex/def_face.jpg" width="80" class="img img-rounded img-fluid"/>
                    
                </div>
                <div class="col-md-10">
                    <p>
                        <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>{{data.title}} <p class="text-secondary text-center">{{data.user}} - {{data.created_at}}</p></strong></a></a>

                   </p>
                   <div class="clearfix"></div>
                    <h5>{{data.body}}</h5>
                    <p>                   
                        <a class="float-right btn btn-outline-primary ml-2" @click="deleteQuestion()" v-if="user && data.user_id == user.id"> <i class="fa fa-trash"></i> Eliminar</a>
                   </p>
                </div>
            </div>
            <div v-if="data.reply_count>0">  
               <a class="link text-info" style="text-align: center;" data-toggle="collapse" href="#collapseReplies" role="button" aria-expanded="false" aria-controls="collapseReplies">Ver respuesta</a>
               <div class="collapse" id="collapseReplies">
                 <div class="card card-inner ml-3 mt-2" >

                    <replies :product=product :question=data ></replies>

                  </div>
                </div>
              </div>
        </div>
    </div>
  </div>
</template>

<script>
import replies from '../replies/replies'

export default {
  components:{replies},
  props:['data', 'product', 'user'],
  data() {
    return {
      errors: {},
      messages: {},
      isAdmin:false
    };
  },
  mounted(){
  },
  created() {
    // axios.get("/isAdmin").then(res => (console.log(res.data)));

  },
  methods: {
    deleteQuestion() {
      axios
        .get(`/${this.product.slug}/${this.product.id}/question/delete/${this.data.id}`)
        .then(res => this.messages = 'Pregunta eliminada')
        .catch(error => (this.errors = error.response.data.errors));

        window.location.reload()
    }
  }

};
</script>

<style>

</style>
