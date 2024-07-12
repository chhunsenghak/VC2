<template>
  <WebHeaderMenu />
  <div style="hi">
    <div class="h-full">
      <slot />
    </div>
  </div>
  <ChatPageComponent />
</template>


<script setup lang="ts">

import WebHeaderMenu from '@/Components/WebHeaderMenu.vue'
import ChatPageComponent from '../../../Components/Chat/ChatPageComponent.vue'


</script>
