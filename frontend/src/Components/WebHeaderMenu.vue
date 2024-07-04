<script setup lang="ts">
import router from '@/router'

// import { Icon } from '@iconify/vue'
let value = localStorage.getItem('access_token')
console.log(value);

const logout = () => {
  localStorage.removeItem('access_token')
  if (value != undefined) {
    router.push('/') // Redirect to Home page after logout
  }
}
</script>
<template>
  <nav
    class="navbar navbar-expand-md navbar-dark fixed-top flex justify-between px-10 py-1 bg-white items-center m-0 shadow-background shadow-sm p-3 mb-5 bg-white rounded"
  >
    <!-- Logo -->
    <div class="flex items-center space-x-20 px-10 py-2 w-25">
      <img src="../../src/assets/logo.jpg" alt="logo" style="width: 150px" />
    </div>

    <!-- Menu Items -->
    <div class="flex justify-center">
      <a
        class="nav-link font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
        href="/"
        >Home</a
      >
      <a
        class="nav-link font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
        href="/shop"
        >Shop</a
      >
      <a
        class="nav-link font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
        href="about.html"
        >About us</a
      >
      <a
        class="nav-link font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
        href="services.html"
        >Services</a
      >
      <a
        class="nav-link font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
        href="/post"
        >Blog</a
      >
      <a
        class="nav-link font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
        href="/contact_us"
        >Contact us</a
      >
    </div>

    <!-- Sign In -->
    <div v-if="value == ''">
      <div class="px-4 py-2 rounded font-semibold btn btn-success">Sign In</div>
    </div>
    <!-- User Profile -->
    <div v-else class="px-10 py-2">
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
            src="../../src/assets/user.png"
            alt="Profile Picture"
            style="width: 40px"
            class="profile-picture rounded-circle"
          />
        </button>
        <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="profileDropdown">
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><hr class="dropdown-divider" /></li>
          <li><button class="dropdown-item" @click="logout">Logout</button></li>
        </ul>
      </div>
    </div>
  </nav>

  function next(arg0: string) { throw new Error("Function not implemented."); }
</template>