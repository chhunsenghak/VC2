<template>
  <WebHeaderMenu />
  <div class="container d-flex align-items-center justify-content-center mt-20" v-if="userChat !== null">
    <div class="col-6 shadow-sm rounded-3 bg-secondary p-3 " style="height: 800px; width: 100%;">
      <div class="d-flex align-items-center gap-3">
        <i class='fas fa-angle-left' style='font-size:24px; color:white'></i>
      </div>
      <div class="card-body rounded contacts_body mt-4 d-flex bg-light aligh-item-center gap-4">
        <div class="chat_list ">
          <input type="text" class="form-control mb-2 shadow-sm" placeholder="Search">
          <ul class="list-group d-flex flex-column">
            <li class="active shadow-sm d-flex border border-2  m-3 p-1 border-top-0 border-end-0 border-start-0 gap-4">
              <img src="../../../../src/assets/image/06.jpg" height="70px" width="70px"
                class="rounded-circle user_img ">
              <div class="contact-details">
                <div class="name">Channich NOEURN</div>
                <div class="status-text">Do you miss me? I want to chat with you this night</div>
                <div class="date mt-1 text-muted">22 March 2024 at 8:00 AM</div>
              </div>
            </li>
            <li class="active shadow-sm d-flex border border-2  m-3 p-1 border-top-0 border-end-0 border-start-0 gap-4">
              <img src="../../../../src/assets/image/06.jpg" height="70px" width="70px"
                class="rounded-circle user_img ">
              <div class="contact-details">
                <div class="name">Channich NOEURN</div>
                <div class="status-text">Do you miss me? I want to chat with you this night</div>
                <div class="date mt-1 text-muted">22 March 2024 at 8:00 AM</div>
              </div>
            </li>
            <li class="active shadow-sm d-flex border border-2  m-3 p-1 border-top-0 border-end-0 border-start-0 gap-4">
              <img src="../../../../src/assets/image/06.jpg" height="70px" width="70px"
                class="rounded-circle user_img ">
              <div class="contact-details">
                <div class="name">Channich NOEURN</div>
                <div class="status-text">Do you miss me? I want to chat with you this night</div>
                <div class="date mt-1 text-muted">22 March 2024 at 8:00 AM</div>
              </div>
            </li>
            <li class="active shadow-sm d-flex border border-2  m-3 p-1 border-top-0 border-end-0 border-start-0 gap-4">
              <img src="../../../../src/assets/image/06.jpg" height="70px" width="70px"
                class="rounded-circle user_img ">
              <div class="contact-details">
                <div class="name">Channich NOEURN</div>
                <div class="status-text">Do you miss me? I want to chat with you this night</div>
                <div class="date mt-1 text-muted">22 March 2024 at 8:00 AM</div>
              </div>
            </li>
          </ul>
        </div>
        <div class="chat_detail d-flex flex-column justify-between" style="width: 50%;">
          <div class="chat-messages p-3">
            <div class="message">
              <strong>Channich NOEURN:</strong>
              <p>Hi there!</p>
            </div>
            <div class="message text-right">
              <strong>Me:</strong>
              <p>Hello!</p>
            </div>
            <div class="message">
              <strong>Channich NOEURN:</strong>
              <p>Doing ? </p>
            </div>
          </div>
          <div class="chat-input p-3 border-top">
            <div class="input-group">
              <input type="text" class="form-control p-3" placeholder="Type a message...">
              <div class="input-group-append">
                <button class="btn btn-primary btn-lg" type="button">Send</button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- <div v-for="user in userChat.users.data" :key="user.id"
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
      </div> -->
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

<style>
li:hover {
  background-color: #353b48bd;
  color: white;
  border-radius: 5px;
  cursor: pointer;
  position: center;
  cursor: pointer;
  transition: background 0.3s;

}

.date {
  font-size: 14px;
}
</style>