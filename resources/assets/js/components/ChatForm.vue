<template>

    <div class="input-group">
      
      <input type="text" placeholder="Ingresa tu mensaje ..." class="form-control" v-model="newMessage" @keyup.enter="sendMessage">

          <span class="input-group-btn">

            <label for="file_input" class="btn btn-primary btn-flat"><i class="fa fa-file bg-aqua"></i></label>
            <input name="file_input" type="file" id="file_input" class="form-control" @change="uploadFile" style="display: none;" />

          </span>

    </div>


</template>

<script>

import firebase from 'firebase/app';
import 'firebase/storage';

export default {
  props: ["user", "conversation"],

  data() {
    return {
      newMessage: null,
      loading: false

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

      this.newMessage = null;
          
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
              type: file.type,
              name: file.name,
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