<script setup lang="ts">
import { Icon } from '@iconify/vue'
</script>
<template>
  <header class="flex justify-between px-50 py-3 bg-white items-center m-0">
    <!-- Logo -->
    <div class="flex items-center space-x-2">
      <img src="../image/logo1.png" alt="" width="100%" height="80vh">
    </div>

    <!-- Menu Items -->
    <nav class="flex justify-center gap-5 space-x-4 " id="nav">
      <router-link class="font-bold px-2 py-2 text-dark-700 fs-5 rounded-lg hover:text-blue-700" to="/post"
        style="text-decoration: none;">HOME</router-link>
      <router-link class="font-bold px-2 py-2 text-dark-700 fs-5 rounded-lg  hover:text-blue-700" to=""
        style="text-decoration: none;">SHOP</router-link>
      <router-link class="font-bold px-2 py-2 text-dark-700 fs-5 rounded-lg  hover:text-blue-700" to=""
        style="text-decoration: none;">ABOUT US</router-link>
      <router-link class="font-bold px-2 py-2 text-dark-700 fs-5 rounded-lg  hover:text-blue-700" to=""
        style="text-decoration: none;">SERVICE</router-link>
      <router-link class="font-bold px-2 py-2 text-dark-700 fs-5 rounded-lg  hover:text-blue-700" to=""
        style="text-decoration: none;">BLOG</router-link>
      <router-link class="font-bold px-2 py-2 text-dark-700 fs-5 rounded-lg  hover:text-blue-700" to=""
        style="text-decoration: none;">CONTACT US</router-link>
    </nav>

    <!-- Sign In -->
    <div>
      <div class="px-4 py-2 rounded font-semibold btn btn-danger">Sign In</div>
    </div>
  </header>
</template>