<script setup lang="ts">
import { useAuthStore } from '@/stores/auth-store'
import axiosInstance from '@/plugins/axios'
import { useRouter } from 'vue-router'

const visible = ref(false)
const router = useRouter()
const store = useAuthStore()
const logout = async () => {
  try {
    const { data } = await axiosInstance.post('/user/logout')
    localStorage.removeItem('access_token')
    location.reload()
    router.push('/login')
  } catch (error) {}
}

import { ref } from 'vue'
import { ElMessageBox } from 'element-plus'

const dialogVisible = ref(false)
</script>
<template>
  <nav
    class="navbar navbar-expand-md navbar-dark fixed-top flex justify-between px-10 py-1 bg-white items-center m-0 shadow-background shadow-sm p-3 mb-5 bg-white"
  >
    <!-- {{ store }} -->
    <!-- Logo -->
    <div class="logo col-2 items-center space-x-20 px-10 py-2 w-25">
      <img src="../../src/assets/logo1.png" alt="logo" style="width: 150px" />
    </div>
    <!-- Menu Items -->
    <div class="content-list col-6 d-flex flex-direction-column justify-center">
      <a
        class="nav-link link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/"
        >ទំព័រដើម</a
      >
      <a
        class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/shop"
        >ទំនិញ</a
      >
      <a
        class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/about_us"
        >អំពីយើង</a
      >
      <a
        class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/services"
        >សេវាកម្ម</a
      >
      <a
        class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/post"
        >ប្លុកថ្មីៗ</a
      >
      <a
        class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/contact_us"
        >ទំនាក់ទំនង</a
      >
      <a
        class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/map"
        >ផែនទី</a
      >
    </div>
    <div class="icon col-1 d-flex justify-content-center text-center">
      <!-- ===============-Notification-================ -->
      <div class="noti col-1 mt-2" style="margin-right: 3rem" @click="dialogVisible = true">
        <svg
          xmlns="http://www.w3.org/2000/svg"
          width="20"
          height="20"
          fill="currentColor"
          class="bi bi-bell-fill"
          viewBox="0 0 16 16"
        >
          <path
            d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901"
          />
        </svg>
        <span class="badge rounded-pill badge-notification bg-danger position-absolute top-5"
          >4</span
        >
      </div>
      <el-dialog
        v-model="dialogVisible"
        title="ព័ត៍មាន​​ ឬសារជូនដំណឹង"
        width="500"
        class="mr-35 mt-17 rounded-3"
        :before-close="handleClose"
      >
        <div class="card border-2 mb-2 m-2" style="max-width: 28rem">
          <div
            class="card-header bg-transparent d-flex flex-direction-column justify-content-between text-center"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              height="24px"
              viewBox="0 -960 960 960"
              width="24px"
              fill="#F19E39"
            >
              <path
                d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"
              />
            </svg>
            <h5>ព័ត៍មាន!</h5>
            <p>10:30 am</p>
          </div>
          <div class="card-body">
            <p class="card-title fw-bold">ផលិតផលថ្មីៗ</p>
            <p class="card-text">សួរស្ដី​! យើ​​ងបាននាំចូលនូវផលិតផលថ្មីៗដល់លោកអ្នក</p>
          </div>
        </div>
        <div class="card border-2 mb-2 m-2" style="max-width: 28rem">
          <div
            class="card-header bg-transparent d-flex flex-direction-column justify-content-between text-center"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              height="24px"
              viewBox="0 -960 960 960"
              width="24px"
              fill="#F19E39"
            >
              <path
                d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"
              />
            </svg>
            <h5>សារជូនដំណឹង!</h5>
            <p>4:00 pm</p>
          </div>
          <div class="card-body">
            <p class="card-title fw-bold">ផ្លាស់ប្ដូរ​លេខសម្ងាត់</p>
            <p class="card-text">ផ្លាស់ប្ដូរលេខសម្ងាត់បានជោគជ័យ</p>
          </div>
        </div>
        <div class="card border-2 mb-2 m-2" style="max-width: 28rem">
          <div
            class="card-header bg-transparent d-flex flex-direction-column justify-content-between text-center"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              height="24px"
              viewBox="0 -960 960 960"
              width="24px"
              fill="#F19E39"
            >
              <path
                d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"
              />
            </svg>
            <h5>សារជូនដំណឹង!</h5>
            <p>7:30 pm</p>
          </div>
          <div class="card-body">
            <p class="card-title fw-bold">បញ្ចូលផលិតផល</p>
            <p class="card-text">ការបញ្ចូលផលិតផលរបស់អ្នកបានជោគជ័យ</p>
          </div>
        </div>
        <div class="card border-2 mb-2 m-2" style="max-width: 28rem">
          <div
            class="card-header bg-transparent d-flex flex-direction-column justify-content-between text-center"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              height="24px"
              viewBox="0 -960 960 960"
              width="24px"
              fill="#F19E39"
            >
              <path
                d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z"
              />
            </svg>
            <h5>សារជូនដំណឹង!</h5>
            <p>ម្សិលមិញ</p>
          </div>
          <div class="card-body">
            <p class="card-title fw-bold">ការបង្កើតហាង</p>
            <p class="card-text">
              ការបង្កើតហាងរបស់អ្នកទទួលបានជោគជ័ត​ លោកអ្នកអាចចាប់ផ្ដើមលក់និងទិញផលិតផលនៅលើ​ Website
              ដោយប្រើអាខោនរបស់អ្នក
            </p>
          </div>
        </div>
        <template #footer>
          <div class="dialog-footer">
            <el-button @click="dialogVisible = false">បោះបង់</el-button>
            <el-button type="primary" @click="dialogVisible = false"> ចែករំលែក </el-button>
          </div>
        </template>
      </el-dialog>
      <!-- //==================================================== -->

      <!-- Sign In -->
      <!-- User Profile -->
      <div v-if="store.isAuthenticated" class="px-10 py-2">
        <div class="dropdown">
          <button
            class="dropdown-toggle border-none bg-white"
            type="button"
            id="profileDropdown"
            data-bs-toggle="dropdown"
            aria-expanded="false"
            data-bs-display="static"
          >
            <img
              v-if="store.user.profile == null"
              src="../../src/assets/user.png"
              alt="Profile Picture"
              style="width: 40px"
              class="profile-picture rounded-circle"
            />
            <img
              v-else
              :src="`http://127.0.0.1:8000/storage/${store.user.profile}`"
              class="rounded-circle"
              width="40px"
              alt="profile"
            />
          </button>
          <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="/profile">គណនី</a></li>
            <li>
              <a
                v-if="store.isAuthenticated && store.user.shop"
                href="/myProducts"
                class="nav-link link-offset-2 text-decoration-none link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
              >
                កសិផលរបស់ខ្ញុំ
              </a>
            </li>
            <li>
              <a
                v-if="store.isAuthenticated"
                href="/chat"
                class="nav-link link-offset-2 text-decoration-none link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
              >
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
  </nav>
</template>

<style scoped>
.card {
  border-color: #d6dad6f2;
  background-color: rgb(245, 240, 240);
  border-radius: 5px;
}
.card:hover {
  background-color: #138f30f2;
  color: white;
  border: none;
  transition: background-color 0.3s ease-in-out;
  cursor: pointer;
  transform: scale(1.02);
  box-shadow: 0px 4px 8px 0px rgba(0, 0, 0, 0.2);
  border-radius: 5px;
  transition: box-shadow 0.3s ease-in-out;
  transition: transform 0.3s ease-in-out;
}
</style>
