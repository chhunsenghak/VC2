<script setup lang="ts">
// import { Icon } from '@iconify/vue'
import { useAuthStore } from '@/stores/auth-store'
import axiosInstance from '@/plugins/axios'
import { useRouter } from 'vue-router'
import { ref } from 'vue'
import { ElButton, ElDrawer } from 'element-plus'
import { CircleCloseFilled } from '@element-plus/icons-vue'

const visible = ref(false)
const router = useRouter()
const store = useAuthStore()
const logout = async () => {
  try {
    const { data } = await axiosInstance.post('/user/logout')
    localStorage.removeItem('access_token')
    location.reload()
    router.push('/login')
  } catch (error) { }
}
</script>
<template>
  <nav
    class="navbar navbar-expand-md navbar-dark fixed-top flex justify-between px-10 py-1 bg-white items-center m-0 shadow-background shadow-sm p-3 mb-5 bg-white">
    <!-- {{ store }} -->
    <!-- Logo -->
    <div class="logo items-center space-x-20 px-10 py-2 w-25">
      <img src="../../src/assets/logo1.png" alt="logo" style="width: 150px" />
    </div>
    <!-- Menu Items -->
    <div class="content-list d-flex flex-direction-column justify-center">
      <a class="nav-link link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/">ទំព័រដើម</a>
      <a class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/shop">ទំនិញ</a>
      <a class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/about_us">អំពីយើង</a>
      <a class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/services">សេវាកម្ម</a>
      <a class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/post">ប្លុកថ្មីៗ</a>
      <a class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
        href="/contact_us">ទំនាក់ទំនង</a>
    </div>
    <div class="d-flex align-items-center">
      <!-- <a href="" class="mb-1 font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900">
      <svg v-if="store.isAuthenticated" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
        class="mt-2.98 bi bi-bell-fill" viewBox="0 0 16 16">
        <path
          d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
      </svg>
      </a>
      <a href="" class="mb-1 font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900">
      <svg v-if="store.isAuthenticated" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
        class="mt-2.98 bi bi-brightness-high" viewBox="0 0 16 16">
        <path
          d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
      </svg>
      </a> -->
      <a v-if="store.isAuthenticated && store.user.shop" href="/myProducts"
        class="mb-1 font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-shop-window"
          viewBox="0 0 16 16">
          <path
            d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5" />
        </svg>
      </a>
      <a v-if="store.isAuthenticated" href="/chat"
        class="mb-1 font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat"
          viewBox="0 0 16 16">
          <path
            d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
        </svg>
      </a>
    </div>
    <div class="nav-right">
      <div class="menu mb-3 ml-10">
        <el-button @click="visible = true">
          <svg xmlns="http://www.w3.org/2000/svg" height="30px" viewBox="0 -960 960 960" width="30px" fill="#000000">
            <path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z" />
          </svg>
        </el-button>
        <el-drawer direction="ltr" size="50%" v-model="visible" :show-close="true">
          <template #header="{ titleId, titleClass }">
            <h4 :id="titleId" :class="titleClass">


              <!-- Logo -->
              <div class="logo-img items-center space-x-20 ">
                <img src="../../src/assets/logo1.png" alt="logo" style="width: 150px" />
              </div>
            </h4>
          </template>
          <!-- ///---Menu---/ -->
          <div class="menu-list">
            <a class="nav-link link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
              href="/">ទំព័រដើម</a>
            <a class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
              href="/shop">ទំនិញ</a>
            <a class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
              href="/about_us">អំពីយើង</a>
            <a class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
              href="/services">សេវាកម្ម</a>
            <a class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
              href="/post">ប្លុកថ្មីៗ</a>
            <a class="nav-link font-bold link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900"
              href="/contact_us">ទំនាក់ទំនង</a>
          </div>
          <div class="icon-menu mt-10 d-flex flex-column gap-5 w-100">
            <svg v-if="store.isAuthenticated" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
              fill="currentColor" class="mt-3 ml-4 bi bi-bell-fill" viewBox="0 0 16 16">
              <path
                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
            </svg>
            <svg v-if="store.isAuthenticated" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
              fill="currentColor" class="mt-3 ml-4 bi bi-brightness-high" viewBox="0 0 16 16">
              <path
                d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
            </svg>
            <a v-if="store.isAuthenticated && store.user.shop" href="/myProducts"
              class="mb-1 font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-shop-window" viewBox="0 0 16 16">
                <path 
                  d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h12V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5m2 .5a.5.5 0 0 1 .5.5V13h8V9.5a.5.5 0 0 1 1 0V13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V9.5a.5.5 0 0 1 .5-.5" />
              </svg>
            </a>
            <a v-if="store.isAuthenticated" href="/chat"
              class="mb-1 font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-200 hover:text-slate-900">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chat"
                viewBox="0 0 16 16">
                <path
                  d="M2.678 11.894a1 1 0 0 1 .287.801 11 11 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8 8 0 0 0 8 14c3.996 0 7-2.807 7-6s-3.004-6-7-6-7 2.808-7 6c0 1.468.617 2.83 1.678 3.894m-.493 3.905a22 22 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a10 10 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9 9 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105" />
              </svg>
            </a>
          </div>
        </el-drawer>
      </div>
      <!-- Sign In -->

      <!-- User Profile -->
      <div v-if="store.isAuthenticated" class="px-10 py-2 mb-3">
        <div class="dropdown">
          <button class="dropdown-toggle border-none bg-white" type="button" id="profileDropdown"
            data-bs-toggle="dropdown" aria-expanded="false" data-bs-display="static">
            <img v-if="store.user.profile == null" src="../../src/assets/user.png" alt="Profile Picture"
              style="width: 40px" class="profile-picture rounded-circle" />
            <img v-else :src="`http://127.0.0.1:8000/storage/${store.user.profile}`" class="rounded-circle" width="40px"
              alt="profile" />
          </button>
          <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="profileDropdown">
            <li><a class="dropdown-item" href="/profile">Account</a></li>
            <li><a class="dropdown-item" href="#">Sitting</a></li>
            <li>
              <hr class="dropdown-divider" />
            </li>
            <li><button class="dropdown-item" @click="logout">Log out</button></li>
          </ul>
        </div>
      </div>
      <div v-else px-10 py-2>
        <a href="/login" class="btn btn-outline-success">ចូលគណនី</a>
      </div>
    </div>
  </nav>
</template>

<style>
.menu {
  display: none;
}

@media (max-width: 768px) {
  .menu {
    display: block;
  }

  .navbar>.content-list a,
  .navbar>.icon svg,
  .navbar>.logo {
    display: none;
  }

  .nav-right {
    background-color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    position: fixed;
    top: 0;
    right: 0;
    margin: 10px;
    height: auto;
    width: 100%;
    z-index: 3000;
    transition: background 0.5s;
  }

  .el-drawer {
    max-width: 500%;
    background-color: #f8f9faf2;
    transition: transform 0.5s;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  }
}
</style>

