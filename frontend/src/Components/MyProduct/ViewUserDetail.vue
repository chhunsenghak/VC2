<template>
  <WebLayout>
    <div class="container" style="width:100% ; height:150vh">
      <div class="card-user-info " style="height:40vh; width:60%" >
        <div class="card-content text-center">
          <div class="card-img">
            <img src="" alt="user.profile" class="profile-image" />
          </div>
          <div class="card-body">
            <h2 class="card-name">N</h2>
            <p class="card-gender">Gender:</p>
            <p class="card-phone">Addres:</p>
            <p class="card-email">e</p>
          </div>
        </div>
      </div>
      <div class="action-user d-flex justify-center text-center">
        <div class="title">
          <h2>សកម្មភាពរបស់ខ្ញុំ</h2>
        </div>
        <div class="group-card-pro">
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'
export default {
  props: ['userStore'],
  name: 'ViewUserDetail',
  components: {
    WebLayout
  }
}
</script>

<style>
.container{
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 10px;
  align-items: center;
}
.card-user-info {
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s;
  display: flex;
  align-items: center;
  justify-content: center;
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

.action-user{
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 20px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s;
  display: flex;
  width: 60%;
  height: 10vh;
}
</style>