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

              <input type="file" class="file_input" @change="uploadFile"/>
<!-- 
              <div style="align-items: center;">
                   <img src="https://www.segurosdelestado.com/images/ajax_loading.gif" v-if="loading" alt="" class="img-loader">
              </div> -->

          </label>        

        </span>

        <span class="input-group-btn">

          <button class="btn btn-sm chat-submit-button" @click="sendMessage" :disabled="disabled">

            <i class="glyphicon glyphicon-send"></i>

          </button>

        </span>

      </div>

    </form>

    <div style="align-items: center; padding-top: 1rem; padding-bottom: 1rem;">
         <img src="https://www.segurosdelestado.com/images/ajax_loading.gif" v-if="loading" alt="" class="img-loader">
    </div>

 

</div>

</template>

<script>

import firebase from 'firebase/app';
import 'firebase/storage';

export default {
  props: ["user", "conversation"],

  data() {
    return {
      newMessage: "",
      loading: Boolean = false

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

      db.collection('chat').doc('conv_'+this.conversation).collection('messages').add({

        message: this.newMessage,
        author: this.user,
        created_at: new Date()
      })

      this.newMessage = '';
          
    },

    uploadFile(e){

      this.loading = true; 

    const file = e.target.files[0];

    firebase.storage().ref('images/'+file.name).put(file)
      .then(response => {
        response.ref.getDownloadURL().then((downloadUrl) => {

          db.collection('chat').doc('conv_'+this.conversation).collection('messages').add({

              url: downloadUrl,
              author: this.user,
              created_at: new Date()
            })       
          })                 
     .catch(err => console.log(err))
    })

      this.loading = false;

  },

  disabled(){

      return !(this.newMessage);
    }
  }


};
</script>