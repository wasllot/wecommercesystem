<template>

      <li class="left clearfix">

         <span class="chat-img pull-left">

           <img src="https://image.ibb.co/jw55Ex/def_face.jpg" width="60" alt="User Avatar" class="img-circle">

         </span>

         <div class="chat-body clearfix">

            <div class="header_sec">

              <a href="#"  @click="showConversation(conversation.id)">

               <strong class="primary-font">{{ conversation.data }}</strong>

             </a>

              <a v-if="!isParticipant(user.id)" href="#" class="text-success pull-right" @click="joinConversation(conversation.id)"
                >
                <strong>Entrar</strong>

              </a>

                <a v-else href="#" class="text-danger pull-right " title="leave conversation" @click="leaveConversation(conversation.id)"
                >
                
                  <strong>Salir</strong>

                </a>

            </div>

         </div>

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

		      window.location.href = "messages?conversation_id=" + id;


		    },

		    leaveConversation(id) {

		      axios.delete(`/conversations/${id}/users`).then(response => {

		        window.location.href = "messages?conversation_id=" + id;

		      });
		    },

		    joinConversation(id) {

		      axios.post(`/conversations/${id}/users`).then(response => {

		        // window.location.href = "messages?conversation_id=" + id;

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