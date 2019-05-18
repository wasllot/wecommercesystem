<template>
	
  <li  v-if="isParticipant(user.id)"> 

        <a href="#"  @click="showConversation(conversation.id)">

          <div class="pull-left">

            <img src="https://image.flaticon.com/icons/svg/56/56491.svg" class="img-circle" alt="User Image">

          </div>

          <h4>
            Conv. {{conversation.id}}
            <small><i class="fa fa-clock-o"></i> {{conversation.created_at}}</small>
          </h4>
          <p>{{conversation.data}}</p>
        </a>
  </li>


</template>

<script>
	
	export default {
		props: ['conversation', 'user'],
		data(){
			return {
				conv: this.conversation,
				participants: [],
			}
		},
		mounted(){
			this.getParticipants(); 
		},
		methods: {

			showConversation(id) {

		      window.location.href = "user-messages?conversation_id=" + id;

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
   			},
   			getParticipants() {

		      axios.get(`/conversations/${this.conversation.id}/users`).then(response => {

		        this.participants = response.data;

		      });

		    },
		    isParticipant(id){

		    	var isMember = false;

		    	this.participants.forEach(function(participant){

		    		if(participant.id == id){

		    			isMember = true;

		    		}

		    	}); 

		    	return isMember;
		    	
		    },

		}

	}

</script>