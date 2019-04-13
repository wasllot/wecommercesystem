<template>
  <div>

       <div class="row">
            <div id="custom-search-input chat-bottom-bar">

               <div class="input-group col-md-12">

                  <input type="text" class="  search-query form-control" placeholder="Buscar conversación" />

               </div>

            </div>

            <br>

            <div class="member_list">

              <ul class="list-unstyled">

                <chatConversationsListOrder v-for="(convo, index) in conversations" :key="index" :conversation=convo :user=user></chatConversationsListOrder>

              </ul>

            </div>

      </div>


  </div>

</template>

<script>

import chatConversationsListOrder from './ChatConversationListOrder'

export default {
  components: {chatConversationsListOrder},
  data: () => ({
    conversation: null,
    conversations: []
  }),

  props: ['user'],
  mounted(){
    this.fetchConversations();
  },

  methods: {
    // createConversation() {
    //   axios.post("/conversations").then(response => {
    //     location.reload();
    //   });
    // },

    fetchConversations() {
      axios.get("/backend/conversationsUser").then(response => {
        this.conversations = response.data;
        console.log(response.data); 
      });
    },

    showConversation(id) {
      window.location.href = "user-messages?conversation_id=" + id;
    },

    isParticipant(id) {
      return window.conversations.indexOf(id) !== -1;
    },

    leaveConversation(id) {
      axios.delete(`/conversations/${id}/users`).then(response => {
        window.location.href = "user-messages?conversation_id=" + id;
      });
    },

    joinConversation(id) {
      axios.post(`/conversations/${id}/users`).then(response => {
        
        window.location.href = "user-messages?conversation_id=" + id;
      });
    }
  },

  // created() {
  //   this.fetchConversations();
 
  // }
};
</script>