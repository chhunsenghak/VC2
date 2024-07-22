<template>
  <div v-if="userChatDetail.length !== 0" class="col-6 overflow-y-scroll" style="height: 550px; scrollbar-width: thin;">
    <div
      class="col-8 chat-header bg-white text-dark shadow-sm p-3 d-flex justify-content-between align-items-center position-fixed">
      <div class="d-flex align-items-center">
        <div class="avatar mr-3">
          <img v-if="userChatDetail.receiver.profile"
            :src="`http://127.0.0.1:8000/storage/${userChatDetail.receiver.profile}`" class="rounded-circle  w-20"
            alt="Avatar" />
          <img v-else src="../../assets/images/user.png" class="rounded-circle  w-18" alt="Avatar" />
        </div>
        <div class="user-info">
          <h5 class="mb-1">{{ userChatDetail.receiver.name }}</h5>
        </div>
      </div>
      <div class="actions">
        <button class="btn text-white dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
            class="bi bi-three-dots-vertical text-dark" viewBox="0 0 16 16">
            <path
              d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
          </svg>
        </button>
        <ul class="dropdown-menu">
          <li><button class="dropdown-item" @click="clearAllMessage(userChatDetail.receiver.id)">Clear</button></li>
          <li><button class="dropdown-item" @click="deleteUserChat(userChatDetail.receiver.id)">Delete</button></li>
        </ul>
      </div>
    </div>
    <div class="chat-body p-3 mt-20 mb-20" ref="chatBody">
      <div v-for="message in userChatDetail.data" :key="message.id">
        <div v-if="message.sender_id == store.user.id && message.text !== null && message.images == null"
          class="message">
          <div class="message-bubble p-2 rounded​​ bg-primary rounded text-white">
            <p class="mb-1">{{ message.text }}</p>
            <small class="text-muted">{{ getFormattedTime(message.created_at) }}</small>
          </div>
        </div>
        <div v-else-if="message.sender_id == store.user.id && message.text == null && message.images !== null"
          class="message">
          <div class="message-bubble p-2 rounded​​ d-flex flex-column rounded text-white">
            <img v-if="userChatDetail.receiver.profile" :src="`http://127.0.0.1:8000/storage/${message.images}`"
              class="rounded img" alt="Avatar" />
            <small class="text-muted">{{ getFormattedTime(message.created_at) }}</small>
          </div>
        </div>
        <div v-else-if="message.sender_id != store.user.id && message.text !== null" class="text-start p-2 rounded">
          <div class="message-bubble p-2 rounded​​​">
            <p class="mb-1">{{ message.text }}</p>
            <small class="text-muted">{{ getFormattedTime(message.created_at) }}</small>
          </div>
        </div>
      </div>
    </div>
    <div class="col-8 bg-white chat-footer p-3 border-top position-fixed top-40" style="margin-top: 400px">
      <div class="chat-box">
        <div class="chat-input d-flex align-items-center ">
          <label class="btn btn-light">
            <span class="material-icons">
              insert_photo
            </span>
            <input type="file" class="form-control d-none" accept="image/*" />
          </label>
          <input type="text" class="form-control" style="height: 40px;" v-model="message.text"
            placeholder="Type a message..." />
          <button class="btn bg-primary text-white d-flex align-items-center position-relative"
            @click="sendMessage(userChatDetail.receiver.id)"><span class="material-icons">
              send
            </span></button>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { useAuthStore } from '@/stores/auth-store'
import { userChatStore } from '@/stores/user-chat.ts'
export default {
  props: ["userChatDetail"],
  data() {
    return {
      store: useAuthStore(),
      chat: userChatStore(),
      message: {
        text: null,
        receiver_id: null,
      },
    };
  },
  methods: {
    sendMessage(id) {
      this.message.receiver_id = id;
      if (this.message.text !== null && this.receiver_id !== null) {
        this.sendTextMessage();
      }
    },

    async sendTextMessage() {
      this.chat.sendText(this.message);
      this.message.text = "";

    },

    getFormattedTime(timestamp) {
      const date = new Date(timestamp);
      const hours = date.getHours();
      const minutes = date.getMinutes().toString().padStart(2, '0');
      const amPm = hours >= 12 ? 'PM' : 'AM';
      const formattedHours = hours % 12 || 12;
      return `${formattedHours}:${minutes} ${amPm}`;
    },
    clearAllMessage(id) {
      this.removeAllMessage(id)
    },
    async removeAllMessage(id) {
      this.chat.removeAllMessages(id);
      setTimeout(function () {
        window.location.reload();
      }, 2500);
    },
    deleteUserChat(id) {
      this.deleteUserChat(id)
    },
    async deleteUserChat(id) {
      this.chat.deleteUserChat(id);
      setTimeout(function () {
        window.location.reload();
      }, 2500);
    },

  },
};
</script>

<style scoped>
.chat-detail {
  height: 100%;
  display: flex;
  flex-direction: column;
}

.chat-header {
  flex-shrink: 0;
}

.avatar img {
  width: 40px;
  height: 40px;
}

.img {
  max-width: 200px;
}

.chat-body {
  flex-grow: 1;
  overflow-y: auto;
}

.message {
  display: flex;
  margin-bottom: 1rem;
  justify-content: flex-end;
}

.message-bubble {
  max-width: 70%;
}

.message-bubble.bg-primary {
  align-self: flex-end;
}

.col-8 {
  /* Ensure scrollbars are visible only when needed */
  scrollbar-width: thin;
  scrollbar-color: #ffffff #ffffff;
  /* Color of the thumb and track */
  overflow-y: auto;
}

/* WebKit Browsers (Chrome, Safari) */
.col-8::-webkit-scrollbar {
  width: 5px;
  /* Adjust width as needed */
  height: 5px;
  /* Adjust height as needed */
}

.col-8::-webkit-scrollbar-thumb {
  background-color: #ffffff;
  /* Color of the thumb */
  border-radius: 5px;
  /* Rounded corners */
}

.col-8::-webkit-scrollbar-track {
  background-color: #f0f0f0;
  /* Color of the track */
}
</style>