<template>
  <WebHeaderMenu />
  <div class="container d-flex align-items-center justify-content-center mt-20" v-if="userChat !== null">
    <div class="col-6 shadow-sm rounded-3 bg-secondary p-3" style="height: 800px;" >
      <div class="d-flex align-items-center gap-3">
        <input type="text" class="form-control mb-2" placeholder="Search">
      </div>
      <div v-for="user in userChat.users.data" :key="user.id"
        class="link-offset-2 link-underline link-underline-opacity-0 text-dark">
        <button v-if="store.user.id !== user.receiver_id[0].id" @click="chatDetail(user.receiver_id[0].id)"
          class="border-none rounded-3 mb-2 bg-white w-100">
          <div class="d-flex hover-bg p-2 align-items-center gap-3 border-bottom">
            <img v-if="user.receiver_id[0].profile"
              :src="`http://127.0.0.1:8000/storage/${user.receiver_id[0].profile}`" class="rounded-circle  w-15"
              alt="Avatar" />
            <img v-else src="../../assets/images/user.png" class="rounded-circle  w-18" alt="Avatar" />
            <div class="d-flex flex-column justify-content-center w-100">
              <div class="d-flex justify-content-between ">
                <h6>{{ user.receiver_id[0].name }}</h6>
                <span class="time-message">{{ getFormattedTime(user.created_at) }}</span>
              </div>
              <div class="d-flex justify-content-between ">
                <p>{{ user.text }}</p>
              </div>
            </div>
          </div>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
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

<style></style>