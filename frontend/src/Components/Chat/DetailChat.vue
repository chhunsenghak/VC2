<template>
  <div class="col-8 overflow-y-scroll" style="height: 550px; ">
    <div
      class="col-8 chat-header bg-white text-dark shadow-sm p-3 d-flex justify-content-between align-items-center position-fixed">
      <div class="d-flex align-items-center">
        <div class="avatar mr-3">
          <img :src="currentUser.avatar" alt="Avatar" class="rounded-circle" />
        </div>
        <div class="user-info">
          <h5 class="mb-0">{{ currentUser.name }}</h5>
          <small>{{ currentUser.status }}</small>
        </div>
      </div>
      <div class="actions">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
          class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
          <path
            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0m0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0" />
        </svg>
      </div>
    </div>
    <div class="chat-body p-3" ref="chatBody">
      <div class="message" v-for="message in messages" :key="message.id">
        <div class="message-bubble p-2 rounded" :class="{ 'bg-primary text-white': message.sender === 'you' }">
          <p class="mb-1">{{ message.text }}</p>
          <small class="text-muted">{{ getFormattedTime(message.timestamp) }}</small>
        </div>
      </div>
    </div>
    <div class="col-8 bg-white chat-footer p-3 border-top position-fixed top-40" style="margin-top: 400px">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Type your message..." v-model="newMessage"
          @keyup.enter="sendMessage" />
        <div class="input-group-append">
          <button class="btn btn-primary" type="button" @click="sendMessage">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="35" fill="currentColor"
              class="bi bi-send-plus-fill" viewBox="0 0 16 16">
              <path
                d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 1.59 2.498C8 14 8 13 8 12.5a4.5 4.5 0 0 1 5.026-4.47zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471z" />
              <path
                d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0m-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5" />
            </svg>
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      currentUser: {
        name: 'John Doe',
        status: 'Online',
        avatar: 'https://via.placeholder.com/150',
      },
      otherUser: {
        name: 'Jane Smith',
        avatar: 'https://via.placeholder.com/150',
      },
      messages: [
        { id: 1, sender: 'you', text: 'Hello!', timestamp: new Date() },
        { id: 2, sender: 'other', text: 'Hi there!', timestamp: new Date() },
        { id: 3, sender: 'you', text: 'How are you?', timestamp: new Date() },
        { id: 3, sender: 'you', text: 'How are you?', timestamp: new Date() },
        { id: 3, sender: 'you', text: 'How are you?', timestamp: new Date() },
        { id: 3, sender: 'you', text: 'How are you?', timestamp: new Date() },
        { id: 4, sender: 'other', text: 'I\'m doing great, thanks for asking!', timestamp: new Date() },
      ],
      newMessage: '',
    };
  },
  methods: {
    getFormattedTime(timestamp) {
      const date = new Date(timestamp);
      const hours = date.getHours();
      const minutes = date.getMinutes().toString().padStart(2, '0');
      const amPm = hours >= 12 ? 'PM' : 'AM';
      const formattedHours = hours % 12 || 12;
      return `${formattedHours}:${minutes} ${amPm}`;
    },
    sendMessage() {
      if (this.newMessage.trim() !== '') {
        const newMessage = {
          id: this.messages.length + 1,
          sender: 'you',
          text: this.newMessage,
          timestamp: new Date(),
        };
        this.messages.push(newMessage);
        this.newMessage = '';
        this.$nextTick(() => {
          this.$refs.chatBody.scrollTop = this.$refs.chatBody.scrollHeight;
        });
      }
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
</style>