<template>
    <ul class="list">

      <li class="header">

        <input type="text" v-model="search" class="search-query form-control" placeholder="Conversación" />

      </li>

      <li>
        <!-- inner menu: contains the actual data -->
        <ul class="menu">

          <chatConversationsListOrder v-for="(convo, index) in conversationsFiltered" :key="index" :conversation=convo :user=user></chatConversationsListOrder>

        </ul>

      </li>

    </ul>

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

};
</script>