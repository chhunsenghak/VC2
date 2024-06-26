<!-- <script setup lang="ts">
import { Icon } from '@iconify/vue'
</script> -->
<template>
  <div class=" fixed-top">
    <header class="flex justify-between px-50 py-3 bg-white items-center justify-content-sm-evently">
      <!-- Logo -->
      <div class="flex items-center space-x-2">
        <!-- <Icon icon="skill-icons:devto-dark" style="font-size: 45px" /> -->
        <img src="../image/logo2.jpg" alt="" width="100%" height="80vh">
        <!-- <span class="text-dark font-bold">ផ្សារកសិករ</span> -->
      </div>

      <div class="topNav-right d-flex">
        <!-- Search items -->
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>

        <!-- Sign In -->
        <div>
          <div class="px-4 py-2 rounded font-semibold text-dark">Sign In</div>
        </div>
      </div>
    </header>
    <!-- Menu Items -->
    <nav class="flex justify-center gap-5 space-x-4 bg-green-600" id="nav">
      <router-link class="font-bold px-2 py-2 text-light-700 fs-5 rounded-lg hover:text-slate-900" to="/post" style="text-decoration: none;">HOME</router-link>
      <router-link class="font-bold px-2 py-2 text-light-700 fs-5 rounded-lg  hover:text-slate-900" to=""  style="text-decoration: none;">CATEGORIES</router-link>
      <router-link class="font-bold px-2 py-2 text-light-700 fs-5 rounded-lg  hover:text-slate-900" to=""  style="text-decoration: none;">ABOUT US</router-link>
      <router-link class="font-bold px-2 py-2 text-light-700 fs-5 rounded-lg  hover:text-slate-900" to=""  style="text-decoration: none;">CONTACT US</router-link>
    </nav>
  </div>
</template>
<!-- 
<style>

</style> -->
