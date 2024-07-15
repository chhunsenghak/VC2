<template>
  <WebHeaderMenu />
  <div class="container-fluid mt-20" v-if="userChat !== null">
    <div class="mt-20​ d-flex " style="background-color: #FAFAFA;">
      <MenuChat :userChat="userChat" @reciever_id="reciever_id" @sender_id="sender_id"></MenuChat>
      <DetailChat :userChatDetail="userChat.receiverUser"></DetailChat>
    </div>
  </div>
  <div v-else>
    <div class="spinner-grow text-primary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-secondary" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-success" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-danger" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-warning" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-info" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-light" role="status">
      <span class="sr-only">Loading...</span>
    </div>
    <div class="spinner-grow text-dark" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
</template>

<script>
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
import MenuChat from '@/Components/Chat/MenuChat.vue'
import DetailChat from '@/Components/Chat/DetailChat.vue'
import { userChatStore } from '@/stores/user-chat.ts'
import { useAuthStore } from '@/stores/auth-store'
const store = useAuthStore()
if (!store.isAuthenticated) {
  window.location.href = "/login"
}
export default {
  name: 'ChatPageComponent',
  components: {
    WebHeaderMenu,
    MenuChat,
    DetailChat
  },
  data() {
    return {
      userChat: userChatStore(),
      userDetail: userChatStore()
    }
  },
  mounted() {
    this.fetchChatUser()
    setInterval(() => {
      this.fetchChatUser()
    }, 5000);
  },
  methods: {
    async fetchChatUser() {
      this.userChat.fetchChatUser();
    },
    reciever_id(id) {
      this.fetchChat(id)
    },
    async fetchChat(id) {
      this.userDetail.fetchReceiverUser(id);
    },
    sender_id(id) {
      this.receiveMessage(id);
    },
    async receiveMessage(id) {
      this.userDetail.receiveMessage(id);
    }
  },
}
</script>

<style>
body {
  overflow: hidden;
}
</style>