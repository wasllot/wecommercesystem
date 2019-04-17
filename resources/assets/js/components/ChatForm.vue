<template>
  <div>

    <form style="display:inherit">
      
      <div class="input-group" >

        <input class="form-control input-sm chat-input" 
          id="btn-input"
          type="text"
          name="message"
          placeholder="Ingresa tu mensaje..."
          v-model="newMessage"
          @keyup.enter="sendMessage" required/>

        <span class="input-group-btn">

          <label class="btn btn-sm chat-submit-button">

              <i class="glyphicon glyphicon-paperclip"></i>

              <input type="file" class="file_input"/>

          </label>        

        </span>

        <span class="input-group-btn">

          <button class="btn btn-sm chat-submit-button" @click="sendMessage" :disabled="disabled">

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
          window.location.href = "user-messages?conversation_id=" + this.conversation;

        });

          // location.reload();
          // window.location.href = "user-messages?conversation_id=" + this.conversation;
          

    }
  }


};
</script>