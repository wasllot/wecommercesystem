<template>
  <div>
    <br>
    <br>
    <div v-for="(message, index) in messages" :key="index"> 
      
      <div class="chat-msg box-blue" v-if="message.author.id == user.id">

          <a :href="message.url" target="_blank">

            <img class="img-responsive" style="margin-bottom: 1rem;" width="150" v-if="message.type == 'image/png' || message.type == 'image/jpg' || message.type == 'image/jpeg'" :src="message.url" />            

              <p v-else>{{message.name}}</p>
          </a>

          <p v-if="message.message">{{message.message}}</p>
          <div class="chat-msg-author">
              <strong>{{ message.author.name }}</strong>&nbsp;
          </div>
      </div>

      <div class="chat-msg box-gray" v-else>

          <a :href="message.url" target="_blank">

            <img class="img-responsive" style="margin-bottom: 1rem;" width="150" v-if="message.url" :src="message.url" />
          </a>

          <p v-if="message.message">{{message.message}}</p>
          <div class="chat-msg-author">
              <strong>{{ message.author.name }}</strong>&nbsp;
          </div>
      </div>

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