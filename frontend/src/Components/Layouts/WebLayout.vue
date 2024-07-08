<script setup lang="ts">
import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
import FooterComponent from '@/Components/Footer.vue'
</script>
<template>
  <WebHeaderMenu />
  <div style="hi">
    <div class="h-full">
      <slot />
    </div>
  </div>
  <FooterComponent />
</template>

<script setup lang="ts"></script>
