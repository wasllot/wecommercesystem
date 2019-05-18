<template>

  <div >

    <div v-for="(message, index) in messages" :key="index">

      <div v-if="message.author.id==user.id" class="direct-chat-msg right">

        <div class="direct-chat-info clearfix">

          <span class="direct-chat-name pull-left" v-if="!message.url">{{message.author.name}}</span>

          <!-- <span class="direct-chat-timestamp pull-right"  v-bind:class="[message.author.id==user.id ? 'pull-right' : 'pull-left']">{{message.created_at}}</span> -->


        </div>
        <!-- /.direct-chat-info -->
        <div v-if="!message.url">
          <img class="direct-chat-img" src="https://image.flaticon.com/icons/svg/56/56491.svg" alt="Message User Image">
        <!-- /.direct-chat-img -->

        <div class="direct-chat-text" v-if="message.message">

          {{message.message}}

        </div>

        </div>


        <a v-else :href="message.url" target="_blank">

         <img class="img-responsive pull-right" style="margin-bottom: 1rem;" width="150" v-if="message.type == 'image/png' || message.type == 'image/jpg' || message.type == 'image/jpeg'" :src="message.url" />            

          <p v-else>{{message.name}}</p>

        </a>

      </div>      

      <div v-else class="direct-chat-msg">

        <div class="direct-chat-info clearfix">

          <span class="direct-chat-name pull-right" v-if="!message.url">{{message.author.name}}</span>

          <!-- <span class="direct-chat-timestamp pull-left">{{message.created_at}}</span> -->

        </div>
        <!-- /.direct-chat-info -->

        <div v-if="!message.url">
          <img class="direct-chat-img" src="https://image.flaticon.com/icons/svg/56/56491.svg" alt="Message User Image">
          <!-- /.direct-chat-img -->
          
          <div class="direct-chat-text" v-if="message.message">
          
            {{message.message}}
          
          </div>
        </div>
        <a v-else :href="message.url" target="_blank">

            <img class="img-responsive" style="margin-bottom: 1rem;" width="150" v-if="message.type == 'image/png' || message.type == 'image/jpg' || message.type == 'image/jpeg'" :src="message.url" />            

              <p v-else>{{message.name}}</p>
          </a>

      </div>



        <!-- /.direct-chat-text -->

    </div>

  </div>

</template>

<script>
export default {
  props: ["conversation", "user"],

  data: () => ({
    messages: []
  }),

  methods: {
    fetchMessages() {

      db.collection('chat').doc('conv_'+this.conversation).collection('messages').orderBy('created_at').onSnapshot((querySnapshot) => {

        let allMessages = [];

        querySnapshot.forEach(doc =>{

            allMessages.push(doc.data()); 
        })

        this.messages = allMessages; 

        console.log(this.messages); 

      })

    },
  },

  created() {
    this.fetchMessages();
    //this.enablePusher();
  }
};
</script>