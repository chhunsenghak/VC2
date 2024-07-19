<template>
  <WebLayout>
    <div class="container d-flex mt-30 mb-10 p-8">
      <ListProducts />
    </div>
  </WebLayout>
</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import ListProducts from '@/Components/MyProduct/ListProducts.vue'

export default {
  components: {
    WebLayout,
    ListProducts,
  },

}
</script>

<style scoped></style>
