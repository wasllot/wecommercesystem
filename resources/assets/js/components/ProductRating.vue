<template>

  <div>
    
      <star-rating :rating="rating" :round-start-rating="false" @rating-selected="setRating"></star-rating>
      <br>

      <p style="color: green;">{{message}}</p>

  </div>

  
</template>

<script>

    export default {
      props: ['data'],
        data(){

            return {

              rating:null,
              errors: {},
              message: ''
             
            } 
        },

        mounted(){
          axios
              .get(`/rating/${this.data}`)
              .then(res => {
                console.log(res); 
                this.rating = res.data;
              })
              .catch(error => this.errors = error.response.data.errors)

        },

        methods: {
           
          setRating(rating){
            axios.
                  post(`/rating/${this.data}/${rating}`)
                  .then(res => {
                    
                    console.log(res); 

                    this.message = res.data; 

                  })
                  .catch(error => {
                    this.message = 'Ha ocurrido un error. '; 
                  })
          }
        
        }
    };
</script>