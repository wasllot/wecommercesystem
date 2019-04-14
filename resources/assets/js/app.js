
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 // window.Vue = require('vue');

import Vuetify from 'vuetify'
Vue.use(Vuetify)

import VueSimplemde from 'vue-simplemde'
Vue.use(VueSimplemde)

import StarRating from 'vue-star-rating'

import md from 'marked'
window.md = md


Vue.component('questions', require('./components/questions/showQuestions.vue'));
Vue.component('question', require('./components/questions/question.vue'));
Vue.component('create', require('./components/questions/create.vue'));
Vue.component('replies', require('./components/replies/replies.vue'));
Vue.component('reply', require('./components/replies/reply.vue'));
// Vue.component('showSentences', require('./components/backend/showSentences.vue'));
Vue.component('example', require('./components/Example.vue'));
Vue.component('test', require('./components/test.vue'));
Vue.component('chat-conversations', require('./components/ChatConversations.vue'));
Vue.component('chat-conversations-order', require('./components/ChatConversationsOrder.vue'));
Vue.component('chat-messages', require('./components/ChatMessages.vue'));
Vue.component('chat-form', require('./components/ChatForm.vue'));
Vue.component('conversation-participants', require('./components/ConversationParticipants.vue'));
Vue.component('show-user-sentences', require('./components/ShowUserSentences.vue'));
Vue.component('star-rating', StarRating);

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))


const app = new Vue({
    el: '#app'
});