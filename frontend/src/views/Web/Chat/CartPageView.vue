<template>
  <WebHeaderMenu />
  <div class="container-fluid mt-20">
    <div class="mt-20​ d-flex ">
      <MenuChat :userChat="userChat" @reciever_id="reciever_id" @sender_id="sender_id"></MenuChat>
      <DetailChat :userChatDetail="userChat.receiverUser" @reciever_id="reciever_id"></DetailChat>
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
      this.userChat.fetchReceiverUser(id);
      console.log(id)
    },
    sender_id(id) {
      this.receiveMessage(id);
    },
    async receiveMessage(id) {
      this.userChat.receiveMessage(id);
    }
  },
}
</script>

<style>
body {
  overflow: hidden;
}
</style>