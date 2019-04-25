<template>
  <div>
    <br>
    <br>
    <div v-for="(message, index) in messages" :key="index"> 
      
      <div class="chat-msg box-blue" v-if="message.author.id == user.id">

          <img class="profile" src="" />

          <p>{{message.message}}</p>
          <div class="chat-msg-author">
              <strong>{{ message.author.name }}</strong>&nbsp;
          </div>
      </div>

      <div class="chat-msg box-gray" v-else>
          <img class="profile" src="" />

          <p>{{message.message}}</p>
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
      })

    },

    deleteMessages() {
      axios
        .delete(`/conversations/${this.conversation}/messages`)
        .then(response => {
          this.messages = response.data;
        });
    },

    enablePusher() {
      let pusher = new Pusher(process.env.MIX_PUSHER_APP_KEY, {
        cluster: process.env.MIX_PUSHER_APP_CLUSTER
      });

      let channel = pusher.subscribe(
        `mc-chat-conversation.${this.conversation}`
      );
      channel.bind("Musonza\\Chat\\Eventing\\MessageWasSent", data => {
        this.messages.data.push(data.message);
      });
    }
  },

  created() {
    this.fetchMessages();
    //this.enablePusher();
  }
};
</script>