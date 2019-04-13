<template>
  <div>
<!--     <div class="input-group" v-if="isParticipant()">
      <input
        id="btn-input"
        type="text"
        name="message"
        class="form-control input-sm"
        placeholder="Type your message here..."
        v-model="newMessage"
        @keyup.enter="sendMessage"
      >
      &nbsp;&nbsp;
      <span class="input-group-btn">
        <button class="btn btn-primary btn-sm" id="btn-chat" @click="sendMessage">Send</button>
      </span>
    </div>
    <div v-else>
      <button class="btn btn-success btn-sm" @click="joinConversation()">Join Conversation</button>
    </div>
  </div> -->


          <form style="display:inherit" method="post" encrypt="multipart/form-data">
            
            <div class="input-group" >

              <input class="form-control input-sm chat-input" 
                id="btn-input"
                type="text"
                name="message"
                placeholder="Ingresa tu mensaje..."
                v-model="newMessage"
                @keyup.enter="sendMessage"/>

              <span class="input-group-btn">
                <label class="btn btn-sm chat-submit-button">
                    <i class="glyphicon glyphicon-paperclip"></i>
                    <input type="file" class="file_input"  />
                </label>        
              </span>
              <span class="input-group-btn">
                <button class="btn btn-sm chat-submit-button" id="send" @click="sendMessage">
                  <i class="glyphicon glyphicon-send"></i>
                </button>
              </span>
            </div>

          </form>

      </div>

</template>

<script>
export default {
  props: ["user", "conversation"],

  data() {
    return {
      newMessage: ""
    };
  },

  methods: {
    isParticipant() {
      // return window.conversations.indexOf(this.conversation) !== -1;
    },

    joinConversation() {
      axios.post(`/conversations/${this.conversation}/users`).then(response => {
        location.reload();
      });
    },

    sendMessage() {
      axios
        .post(`/conversations/${this.conversation}/messages`, {
          message: this.newMessage
        })
        .then(response => {
          this.newMessage = "";
          location.reload(); // comment this out if you are broadcasting
        });
    }
  }


};
</script>