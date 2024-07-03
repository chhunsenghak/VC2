<template>
  <div class="row" style="margin-top: 7rem">
    <h5 class="ml-5">List Products</h5>
    <div
      class="card-container mt-5 col-md-4 mb-4"
      v-for="product in sortedProducts"
      :key="product.id"
    >
      <div class="card rounded-2 p-2 shadow-sm rounded">
        <div
          class="rounded-2 d-flex justify-content-center mt-2"
          style="background-color: white; width: 100%; height: 125px"
        >
          <img
            v-if="product.image"
            :src="`http://127.0.0.1:8000/products_images/${product.image}`"
            style="max-width: 95%; max-height: 95%; object-fit: contain"
            :alt="product.name"
          />
        </div>
        <p class="card-title fw-bold">{{ product.name }}</p>
        <p class="card-price fw-bold">{{ product.price }} Riels</p>
        <div class="d-flex flex-column justify-content-between seller-part">
          <p>
            Seller:
            <img
              :src="product.sellerImage"
              class="rounded-circle"
              style="width: 33px; height: 33px; border: 1px solid black"
              :alt="product.sellerName"
            />
          </p>
          <div class="d-flex justify-content-start">
            <i v-for="n in 4" :key="n" class="material-icons me-1">star</i>
          </div>
        </div>
        <div class="btn">
          <button type="button" class="btn btn-success">Chat Now</button>
          <button type="button" class="btn btn-primary ml-5">View Detail</button>
        </div>
      </div>
    </div>
  </div>
</template>


<script setup lang="ts">
import { onMounted, ref, computed } from 'vue'
import axiosInstance, { ProductLists } from '@/plugins/axios'

const products = ref([])

onMounted(async () => {
  try {
    const response = await ProductLists.getProducts()
    products.value = response.data.data
  } catch (error) {
    console.error('Error fetching products:', error)
  }
})

const sortedProducts = computed(() => {
  return [...products.value].sort((a, b) => a.name.localeCompare(b.name))
})
</script>

<style scoped>
.card-container {
  width: 19rem;
  margin-left: 10px;
}
.card {
  height: 380px;
  overflow-y: auto; /* Add this line to enable vertical scrolling */
  .card-title,
  .card-price,
  .seller-part {
    margin-left: 15px;
  }
  .card-title {
    font-size: 20px;
    margin-top: 10px;
  }
  .card-price {
    color: rgb(1, 71, 1);
    font-size: 15px;
  }
}
.material-icons{
  color: #EAC612;
  font-size: 18px;
  
}
.btn{
  margin-top: 5px;
}
</style>
