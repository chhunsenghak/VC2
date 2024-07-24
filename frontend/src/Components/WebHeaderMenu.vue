<script setup lang="ts">
import { onMounted, ref } from 'vue'
import { useAuthStore } from '@/stores/auth-store'
import axiosInstance from '@/plugins/axios'
import { useRouter } from 'vue-router'
import { notificationStore } from "@/stores/notifications"
const visible = ref(false)
const router = useRouter()
const store = useAuthStore()
const notifications = notificationStore()
const dialogVisible = ref(false)

onMounted(() => {
  showNotification();
  setInterval(() => {
    showNotification();
  }, 2000);
});
const showNotification = () => {
  notifications.fetchNotifications();
}

const numberOfNotifications = (data) => {
  // return notifications.notifications.data.length;
  
}

const logout = async () => {
  try {
    const { data } = await axiosInstance.post('/user/logout')
    localStorage.removeItem('access_token')
    location.reload()
    router.push('/login')
  } catch (error) { }
}

const getFormattedTime = (timestamp) => {
  const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

  const currentDate = new Date();
  const inputDate = new Date(timestamp);

  // Get components for current date
  const currentDay = currentDate.getDate();
  const currentMonth = currentDate.getMonth();
  const currentYear = currentDate.getFullYear();

  // Get components for input date
  const inputDay = inputDate.getDate();
  const inputMonth = inputDate.getMonth();
  const inputYear = inputDate.getFullYear();

  // Compare date parts
  if (currentYear === inputYear && currentMonth === inputMonth && currentDay === inputDay) {
    // Today: Show only time
    const hours = inputDate.getHours();
    const minutes = inputDate.getMinutes().toString().padStart(2, '0');
    const amPm = hours >= 12 ? 'PM' : 'AM';
    const formattedHours = hours % 12 || 12;
    return `${formattedHours}:${minutes} ${amPm}`;
  } else if (currentYear === inputYear && currentMonth === inputMonth && currentDay - inputDay === 1) {
    // Yesterday: Show 'Yesterday'
    return 'ម្សិលមិញ';
  } else {
    // Other days: Show full date and time
    const dayOfWeek = daysOfWeek[inputDate.getDay()];
    const dayOfMonth = inputDate.getDate();
    const month = inputDate.toLocaleString('default', { month: 'long' });
    const year = inputDate.getFullYear();
    const hours = inputDate.getHours();
    const minutes = inputDate.getMinutes().toString().padStart(2, '0');
    const amPm = hours >= 12 ? 'រសៀល' : 'ព្រឹក';
    const formattedHours = hours % 12 || 12;
    return `${dayOfWeek}, ${month} ${dayOfMonth}, ${year} - ${formattedHours}:${minutes} ${amPm}`;
  }
}
</script>
<template>

  <nav
    class="navbar navbar-expand-md navbar-dark fixed-top flex justify-between px-10 py-1 bg-white items-center m-0 shadow-background shadow-sm p-3 mb-5 bg-white">
    <div class="container-fluid">
      <!-- {{ store }} -->
      <!-- Logo -->
      <div class="logo col-2 items-center space-x-20 px-10 py-2 w-25">
        <img src="../../src/assets/logo1.png" alt="logo" style="width: 150px" />
      </div>
      <!-- Menu Items -->
      <div class="collapse content-list col-6 d-flex flex-direction-column justify-center" id="navbarNav">
        <router-link
          class="nav-link link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
          to="/">ទំព័រដើម</router-link>
        <router-link
          class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
          to="/shop">ទំនិញ</router-link>
        <router-link
          class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
          to="/about_us">អំពីយើង</router-link>
        <router-link
          class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
          to="/services">សេវាកម្ម</router-link>
        <router-link
          class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
          to="/post">ប្លុកថ្មីៗ</router-link>
        <router-link
          class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
          to="/contact_us">ទំនាក់ទំនង</router-link>
        <router-link
          class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
          to="/map">ផែនទី</router-link>
      </div>
      <div class="icon col-1 d-flex justify-content-center text-center">
        <!-- ===============-Notification-================ -->
        <div v-if="store.isAuthenticated" class="noti btn mt-2" @click="dialogVisible = true"
          style="margin-right:-40px">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="30" fill="currentColor" class="bi bi-bell-fill"
            viewBox="0 0 16 16">
            <path
              d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
          </svg>
          <span class="badge rounded-pill badge-notification bg-danger position-absolute top-5"></span>
        </div>
        <el-dialog v-model="dialogVisible" title="ព័ត៍មាន​​ ឬសារជូនដំណឹង" width="500" class="mr-35 mt-17 rounded-3"
          :before-close="handleClose">
          <div v-for="notification in notifications.notifications.data" :key="notification.id"
            class="card border-2 mb-2 m-2" style="max-width: 28rem">
            <div class="card-header bg-transparent d-flex flex-direction-column justify-content-between text-center">
              <h5>{{ notification.type }}</h5>
              <p>{{ getFormattedTime(notification.created_at) }}</p>
            </div>
            <div class="card-body">
              <p class="card-title fw-bold">{{ notification.title }}</p>
              <p class="card-text">{{ notification.description }}</p>
            </div>
          </div>
        </el-dialog>
        <!-- //==================================================== -->

        <!-- Sign In -->
        <!-- User Profile -->
        <div v-if="store.isAuthenticated" class="px-10 py-2">
          <div class="dropdown">
            <button class="dropdown-toggle border-none bg-white" type="button" id="profileDropdown"
              data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
              <img v-if="store.user.profile == null" src="../../src/assets/user.png" alt="Profile Picture"
                style="width: 40px" class="profile-picture rounded-circle" />
              <img v-else :src="`http://127.0.0.1:8000/storage/${store.user.profile}`" class="rounded-circle"
                width="40px" alt="profile" />
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="profileDropdown">
              <li><a class="dropdown-item" href="/profile">គណនី</a></li>
              <li>
                <a v-if="store.isAuthenticated && store.user.shop" href="/myProducts"
                  class="nav-link link-offset-2 text-decoration-none link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900">
                  កសិផលរបស់ខ្ញុំ
                </a>
              </li>
              <li>
                <a v-if="store.isAuthenticated" href="/chat"
                  class="nav-link link-offset-2 text-decoration-none link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900">
                  សារ
                </a>
              </li>
              <li><a class="dropdown-item" href="#">ការកំណត់</a></li>
              <li>
                <hr class="dropdown-divider" />
              </li>

              <li><button class="dropdown-item" @click="logout">ចាកចេញ</button></li>
            </ul>
          </div>
        </div>
        <div v-else>
          <a href="/login" class="btn btn-outline-success" style="margin-right: 6rem; width:55%">ចូលគណនី</a>
        </div>
      </div>
    </div>
  </nav>
</template>

<style scoped>
.card {
  border-color: #d6dad6f2;
  background-color: rgb(245, 240, 240);
  border-radius: 5px;
}
</style>