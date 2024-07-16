<template>
  <div class="col-4  p-3 overflow-y-scroll" style="height: 550px; scrollbar-width: thin;">
    <h4>Chat Messages</h4>
    <div class="d-flex align-items-center gap-3">
      <input type="text" class="form-control rounded-4 border-1 border-dark mb-3" placeholder="Search">
    </div>
    <div v-for="user in userChat.users.data" :key="user.id"
      class="link-offset-2 link-underline link-underline-opacity-0 text-dark">
      <button v-if="store.user.id !== user.receiver_id[0].id" @click="chatDetail(user.receiver_id[0].id)"
        class="border-none bg-white w-100">
        <div class="d-flex hover-bg p-2 align-items-center gap-3 border-bottom">
          <img v-if="user.receiver_id[0].profile" :src="`http://127.0.0.1:8000/storage/${user.receiver_id[0].profile}`"
            class="rounded-circle  w-15" alt="Avatar" />
          <img v-else src="../../assets/images/user.png" class="rounded-circle  w-18" alt="Avatar" />
          <div class="d-flex flex-column justify-content-center w-100">
            <div class="d-flex justify-content-between ">
              <h6>{{ user.receiver_id[0].name }}</h6>
              <span class="time-message">{{ formattedTime(user.created_at) }}</span>
            </div>
            <div class="d-flex justify-content-between ">
              <p>{{ user.text }}</p>
            </div>
          </div>
        </div>
      </button>
      <button v-else-if="user.receiver_id[0].id == store.user.id" @click="receiverDetail(user.sender_id[0].id)"
        class="border-none bg-white w-100">
        <div class="d-flex hover-bg p-2 align-items-center gap-3 border-bottom">
          <img v-if="user.sender_id[0].profile" :src="`http://127.0.0.1:8000/storage/${user.sender_id[0].profile}`"
            class="rounded-circle  w-15" alt="Avatar" />
          <img v-else src="../../assets/images/user.png" class="rounded-circle  w-18" alt="Avatar" />
          <div class="d-flex flex-column justify-content-center w-100">
            <div class="d-flex justify-content-between ">
              <h6>{{ user.sender_id[0].name }}</h6>
              <span class="time-message">{{ formattedTime(user.created_at) }}</span>
            </div>
            <div class="d-flex justify-content-between ">
              <p>{{ user.text }}</p>
            </div>
          </div>
        </div>
      </button>
    </div>
  </div>
</template>

<script>
import { useAuthStore } from '@/stores/auth-store'
export default {
  props: ["userChat"],
  data() {
    return {
      user_id: "",
      store: useAuthStore(),
    }
  },
  methods: {
    formattedTime(timestamp) {
      const date = new Date(timestamp);
      const hours = date.getHours();
      const minutes = date.getMinutes().toString().padStart(2, '0');
      const amPm = hours >= 12 ? 'PM' : 'AM';
      const formattedHours = hours % 12 || 12;
      return `${formattedHours}:${minutes} ${amPm}`;
    },

    chatDetail(id) {
      this.$emit('reciever_id', id);
    },

    receiverDetail(id) {
      this.$emit('sender_id', id);
    }
  }
}
</script>

<style>
.hover-bg {
  transition: background-color 0.3s ease;
  /* Smooth transition for background color change */
}

.hover-bg:hover {
  background-color: #f6f6f6;
  /* New background color on hover */
}

.col-4 {
  /* Ensure scrollbars are visible only when needed */
  scrollbar-width: thin;
  scrollbar-color: #ffffff #ffffff;
  /* Color of the thumb and track */
  overflow-y: auto;
}

/* WebKit Browsers (Chrome, Safari) */
.col-4::-webkit-scrollbar {
  width: 5px;
  /* Adjust width as needed */
  height: 5px;
  /* Adjust height as needed */
}

.col-4::-webkit-scrollbar-thumb {
  background-color: #ffffff;
  /* Color of the thumb */
  border-radius: 5px;
  /* Rounded corners */
}

.col-4::-webkit-scrollbar-track {
  background-color: #f0f0f0;
  /* Color of the track */
}
</style>