<template>
<div>
  <a href="#"  v-for="(user, index) in participants" :key="index">
  
    <img class="contacts-list-img" src="https://image.flaticon.com/icons/svg/56/56491.svg" alt="User Image">
  
    <div class="contacts-list-info">
  
          <span class="contacts-list-name">
            
            {{user.name}}
  
          </span>
  
      <span class="contacts-list-msg">{{user.email}}</span>
      
    </div>
    <!-- /.contacts-list-info -->
  </a>
  <br>
</div>
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