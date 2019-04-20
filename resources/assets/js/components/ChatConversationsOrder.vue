<template>
  <div>

       <div class="row">

            <div id="custom-search-input" class="chat-bottom-bar">

               <div class="input-group col-md-12">

                  <input type="text" class="  search-query form-control" placeholder="Buscar conversación" v-model="search" />

               </div>

            </div>

            <br>

            <div class="member_list">

              <ul class="list-unstyled">

                <chatConversationsListOrder v-for="(convo, index) in conversationsFiltered" :key="index" :conversation=convo :user=user></chatConversationsListOrder>

              </ul>

            </div>

      </div>

  </div>

</template>

<script>

import chatConversationsListOrder from './ChatConversationListOrder'

export default {

  components: {chatConversationsListOrder},
  props: ['user'],
  data: () => ({

    conversation: null,
    conversations: [],
    search: ''

  }),
  computed: {
    conversationsFiltered(){

      return this.conversations.filter(conversation => {

        return conversation.data.toLowerCase().includes(this.search.toLowerCase())

      })
    }
  },
  mounted(){

    this.fetchConversations();
  },

  methods: {

    fetchConversations() {
      axios.get("/backend/conversationsUser").then(response => {
        this.conversations = response.data;
        console.log(response.data); 
      });
    },

    showConversation(id) {
      // window.location.href = "user-messages?conversation_id=" + id;

      axios.get(`/conversations/${id}`).then(response => {

        }).catch(error =>{
          
          console.log(error); 
        });
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
        
        // window.location.href = "user-messages?conversation_id=" + id;
      });
    }
  },

};
</script>