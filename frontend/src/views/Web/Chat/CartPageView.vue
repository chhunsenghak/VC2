<template>
  <WebHeaderMenu />
  <div class="container-fluid mt-20">
    <div class="mt-20​ d-flex">
      <MenuChat :userChat="userChat"></MenuChat>
      <DetailChat></DetailChat>
    </div>
  </div>
</template>

<script>
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
import MenuChat from '@/Components/Chat/MenuChat.vue'
import DetailChat from '@/Components/Chat/DetailChat.vue'
import { userChatStore } from '@/stores/user-chat.ts'
export default {
  name: 'ChatPageComponent',
  components: {
    WebHeaderMenu,
    MenuChat,
    DetailChat
  },
  data() {
    return {
      userChat: userChatStore()
    }
  },
  mounted() {
    this.fetchChatUser()
  },
  methods: {
    async fetchChatUser() {
      this.userChat.fetchChatUser();
    }
  },
}
</script>
