<template>
  <ul class="chat list-unstyled">
    <li class="left clearfix" v-for="(user, index) in participants" :key="index">
      <div class="chat-body clearfix">
        <div class="header">
          <strong class="primary-font" style="text-align:center !important;">{{ user.name }}</strong>
        </div>
      </div>
    </li>
  </ul>
</template>

<script>
export default {
  props: ["conversation"],

  data: () => ({
    participants: []
  }),

  methods: {
    getParticipants() {
      axios.get(`/conversations/${this.conversation}/users`).then(response => {
        this.participants = response.data;
      });
    }
  },

  created() {
    this.getParticipants(this.conversation);
  }
};
</script>