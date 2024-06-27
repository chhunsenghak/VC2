<script setup lang="ts">
import { Icon } from '@iconify/vue'
</script>
<template>
  <header class="flex justify-between px-50 py-3 bg-white items-center m-0">
    <!-- Logo -->
    <div class="flex items-center space-x-2 w-25">
      <img src="../../src/assets/images/logo (1).png" alt="" style="width: 100px" />
    </div>

    <!-- Menu Items -->
    <nav class="flex justify-center space-x-4">
      <a
        class="nav-link font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
        href="/"
        >Home</a
      >
      <a
        class="nav-link font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
        href="shop.html"
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
        href="blog.html"
        >Blog</a
      >
      <a
        class="nav-link font-bold px-3 py-2 text-slate-700 rounded-lg hover:bg-slate-100 hover:text-slate-900"
        href="/contact_us"
        >Contact us</a
      >
    </nav>

    <!-- Sign In -->
    <div>
      <div class="px-4 py-2 rounded font-semibold btn btn-danger">Sign In</div>
    </div>
  </header>
</template>