<template>
  <div>

       <div class="row">
            <div id="custom-search-input">

               <div class="input-group col-md-12">

                  <input type="text" class="search-query form-control" v-model="search" placeholder="Conversation" />

                  <button class="btn btn-danger" type="button">

                  <span class=" glyphicon glyphicon-search"></span>

                  </button>

               </div>

            </div>

            <br>

            <div class="member_list">

              <ul class="list-unstyled">

                <chatConversationsList v-for="(convo, index) in conversationsFiltered" :key="index" :conversation=convo :user=user></chatConversationsList>

              </ul>

            </div>

      </div>


  </div>

</template>

<script>

import chatConversationsList from './ChatConversationsList'

export default {
  components: {chatConversationsList},
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
    // createConversation() {
    //   axios.post("/conversations").then(response => {
    //     location.reload();
    //   });
    // },

    fetchConversations() {
      axios.get("/conversations").then(response => {
        this.conversations = response.data;
        console.log(response.data); 
      });
    },

    showConversation(id) {
      window.location.href = "messages?conversation_id=" + id;
    },

    isParticipant(id) {
      return window.conversations.indexOf(id) !== -1;
    },

    leaveConversation(id) {
      axios.delete(`/conversations/${id}/users`).then(response => {
        window.location.href = "messages?conversation_id=" + id;
      });
    },

    joinConversation(id) {
      axios.post(`/conversations/${id}/users`).then(response => {
        
        window.location.href = "messages?conversation_id=" + id;
      });
    }
  },

  // created() {
  //   this.fetchConversations();
 
  // }
};
</script>