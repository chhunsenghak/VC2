<template>
  <div class="row mt-5">
    <h5 class="ml-5">List Products</h5>
    <div class="col-md-3 mb-4" v-for="product in sortedProducts" :key="product.id">
      <div class="card rounded-2 p-4 shadow-sm h-100 mt-5">
        <div class="image-container rounded-2 mb-3">
          <img
            v-if="product.image"
            :src="getProductImageUrl(product.image)"
            :alt="product.name"
            class="product-image"
          />
        </div>
        <div class="d-flex justify-content-between mb-3">
          <h5 class="card-title fw-bold">{{ product.name }}</h5>
          <i class="material-icons view-detail" @click="showProductDetails(product)">visibility</i>
        </div>
        <p class="card-price fw-bold mb-3">{{ formatPrice(product.price) }}</p>
        <div class="d-flex flex-column justify-content-between seller-part h-100">
          <p class="mb-2">Seller: {{ product.shop_owner.name }}</p>
          <div class="d-flex justify-content-start mb-3">
            <i v-for="n in 4" :key="n" class="material-icons me-1 star-icon">star</i>
          </div>
          <button type="button" class="btn btn-success">Chat Now</button>
        </div>
      </div>
    </div>

    <!-- Modal for Product Details -->
    <div
      v-if="showModal"
      class="modal d-flex justify-content-center align-items-center"
      @click.self="closeModal"
    >
      <div class="modal-content d-flex flex-column">
        <div class="modal-header d-flex justify-content-between align-items-center">
          <h3>Product Detail</h3>
          <span class="close" @click="closeModal">&times;</span>
        </div>
        <div class="modal-body d-flex flex-column flex-md-row">
          <div class="col-md-6 d-flex justify-content-center align-items-center">
            <img
              v-if="selectedProduct.image"
              :src="getProductImageUrl(selectedProduct.image)"
              :alt="selectedProduct.name"
              class="product-image-large img-fluid"
            />
          </div>
          <div class="col-md-6 mt-4 mt-md-0">
            <p class="card-title" style="font-size: 20px">Name: {{ selectedProduct.name }}</p>
            <p class="card-price" style="margin-top: 1.5rem; font-size: 20px; color: black">
              Price: {{ formatPrice(selectedProduct.price) }}
            </p>
            <p class="card-seller" style="font-size: 20px">
              Seller: {{ selectedProduct.shop_owner.name }}
            </p>
            <p class="card-cate" style="font-size: 20px">
              Category: {{ selectedProduct.category.name }}
            </p>
            <p class="card-quan" style="font-size: 20px">
              Quantity:
              {{ selectedProduct.stock.quantity + ' ' + selectedProduct.stock.stock_type.name }}
            </p>
            <p class="card-desc" style="font-size: 20px">
              Description: {{ selectedProduct.description }}
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script setup lang="ts">
import { ref, computed, onMounted } from 'vue'
import axiosInstance, { ProductLists } from '@/plugins/axios'

const products = ref([])
const showModal = ref(false)
const selectedProduct = ref(null)

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

const getProductImageUrl = (imageName: string) => {
  return `http://127.0.0.1:8000/products_images/${imageName}`
}

const formatPrice = (price: number) => {
  return `${price.toLocaleString()} Riels`
}

const showProductDetails = (product) => {
  selectedProduct.value = product
  showModal.value = true
}

const closeModal = () => {
  showModal.value = false
  selectedProduct.value = null
}
</script>

<style scoped>
.card {
  height: 380px;
  overflow-y: auto;
  transition: transform 0.3s, box-shadow 0.3s;
}
.card-title,
.card-seller,
.card-cate,
.card-quan,
.card-desc,
.card-stock-type {
  color: black;
}
.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.image-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 150px;
  background-color: #f8f9fa;
  border-radius: 10px;
}

.product-image {
  max-width: 95%;
  max-height: 95%;
  object-fit: contain;
}

.card-title {
  font-size: 18px;
  color: #333;
  word-break: break-word;
  overflow-wrap: break-word;
}

.view-detail {
  font-size: 20px;
  color: #6c757d;
  cursor: pointer;
}

.card-price {
  color: #018001;
  font-size: 16px;
  margin-top: -1rem;
}

.seller-part {
  color: #6c757d;
}

.btn {
  background-color: #018001;
  border-color: #018001;
  font-weight: bold;
  padding: 8px 16px;
  color: #fff;
  transition: transform 0.3s, box-shadow 0.3s;
  margin-top: -1.5rem;
}

.btn:hover {
  background-color: #015001;
  border-color: #015001;
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

.star-icon {
  color: #ffa534;
  margin-top: -1.5rem;
}

/* Modal styles */
.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  background-color: #fff;
  padding: 20px;
  border-radius: 10px;
  max-width: 800px;
  width: 90%;
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
  animation: fadeIn 0.3s ease-in-out;
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #e9ecef;
  padding-bottom: 10px;
}

.modal-header h3 {
  margin: 0;
}

.close {
  font-size: 24px;
  cursor: pointer;
  color: #333;
}

.modal-body {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

.product-image-large {
  max-width: 100%;
  height: auto;
  margin-bottom: 20px;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: scale(0.9);
  }
  to {
    opacity: 1;
    transform: scale(1);
  }
}
</style>
