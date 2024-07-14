<template>
  <div class="col-4 shadow p-3 rounded-4 overflow-y-scroll" style="height: 550px; ">
    <h4>Chat Messages</h4>
    <div class="d-flex align-items-center gap-3">
      <input type="text" class="form-control rounded-4 border-1 border-dark mb-3" placeholder="Search">
    </div>
    <a href="" v-for="user in userChat.users.data" :key="user.id"
      class="link-offset-2 link-underline link-underline-opacity-0 text-dark">
      <div class="d-flex hover-bg pl-1 align-items-center gap-3 border-bottom">
        <img v-if="user.receiver_id[0].profile" :src="`http://127.0.0.1:8000/storage/${user.receiver_id[0].profile}`"
          class="rounded-circle  w-18" alt="Avatar" />
        <img v-else src="../../assets/images/user.png" class="rounded-circle  w-18" alt="Avatar" />
        <div class="d-flex flex-column col-9 mt-3">
          <div class="d-flex justify-content-between">
            <h1 style="font-size: 20px">{{ user.receiver_id[0].name }}</h1>
            <span class="time-message">{{ formattedTime(user.created_at) }}</span>
          </div>
          <p v-if="user.text" class="text-truncate">{{ user.text }}</p>
          <p v-else-if="user.images" class="text-truncate">photo</p>
          <p v-else class="mt-3"></p>
        </div>
      </div>
    </a>
  </div>

</template>

<script>

export default {
  props: ["userChat"],
  methods: {
    formattedTime(timestamp) {
      const date = new Date(timestamp);
      const hours = date.getHours();
      const minutes = date.getMinutes().toString().padStart(2, '0');
      const amPm = hours >= 12 ? 'PM' : 'AM';
      const formattedHours = hours % 12 || 12;
      return `${formattedHours}:${minutes} ${amPm}`;
    },
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
</style>