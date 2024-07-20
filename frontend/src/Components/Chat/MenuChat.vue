<template>
  <div class="overflow-y-scroll" style="height: 320px">
    <div class="list-group pl-4 gap-1" id="myList" role="tablist">
      <li v-for="user in userChat.users.data" :key="user.id" class="list-group-item p-0" data-bs-dismiss="dropdown">
        <button @click="chatDetail(user.id)" class="border-none w-100 d-flex p-1 gap-1">
          <div class="col-2">
            <img v-if="user.profile" :src="`http://127.0.0.1:8000/storage/${user.profile}`" class="rounded-circle  w-10"
              alt="Avatar" />
            <img v-else src="../../assets/images/user.png" class="rounded-circle  w-10" alt="Avatar" />
          </div>
          <div class="col-9 d-flex flex-column mt-1">
            <!-- Name and time -->
            <div class="d-flex justify-content-between align-items-center">
              <h6 class="">{{ user.name }}</h6>
              <small class="text-muted">{{ formattedTime(user.latest_message.created_at) }}</small>
            </div>
            <!-- Latest message -->
            <div class="">
              <p class="text-truncate text-start">{{ user.latest_message.text }}</p>
            </div>
          </div>
        </button>
        <!-- Dropdown menu for user actions -->
      </li>
    </div>
  </div>
</template>

<script>
import { useAuthStore } from '@/stores/auth-store'
import { userChatStore } from '@/stores/user-chat.ts'
export default {
  props: ["userChat"],
  data() {
    return {
      user_id: "",
      store: useAuthStore(),
      userChatStore: userChatStore(),
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
      console.log(id);
      this.$emit('reciever_id', id);
    },
  }
}
</script>

<style></style>