<template>
  <div class="card-user-info">
    <div class="card-content text-center">
      <div class="card-img">
        <img
          :src="`http://127.0.0.1:8000/storage/${userStore.user.profile}`"
          alt="user.profile"
          class="profile-image"
        />
      </div>
      <div class="card-body">
        <h2 class="card-name">{{ userStore.user.name }}</h2>
        <p class="card-gender">Gender: {{ userStore.user.gender }}</p>
        <p class="card-phone">Phone: {{ userStore.user.phone }}</p>
        <p class="card-email">{{ userStore.user.email }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    props: ["userStore"]
}
</script>

<style>
.card-user-info {
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 20px;
  width: 350px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s;
}

.card-content {
  display: flex;
  align-items: center;
}

.card-img {
  margin-right: 20px;
}

.profile-image {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 2px solid #ddd;
}

.card-body {
  flex: 1; /* To make the card body take remaining space */
}

.card-name {
  font-size: 1.5em;
  font-weight: bold;
  margin-bottom: 10px;
  color: #333;
}

.card-gender,
.card-phone,
.card-email {
  font-size: 1em;
  margin-bottom: 5px;
  color: #666;
}
</style>