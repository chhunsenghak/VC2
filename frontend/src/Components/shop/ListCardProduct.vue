<template>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
          <h5 style="margin-top: 15rem">List Products</h5>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-3 mb-4" v-for="product in store.products.data" :key="product.id">
        <div class="card rounded-2 p-4 shadow-sm h-100">
          <div class="image-container rounded-2 mb-3">
            <img
              v-if="product.image"
              :src="`http://127.0.0.1:8000/products_images/${product.image}`"
              :alt="product.name"
              class="product-image"
            />
          </div>
          <div class="card-content">
            <div class="d-flex justify-content-between mb-3">
              <h5 class="pro-name fw-bold">{{ product.name }}</h5>
              <i class="material-icons view-detail">visibility</i>
            </div>
            <div class="d-flex flex-column justify-content-between seller-part h-100">
              <p class="mb-2 fw-bold pro-price">{{ product.price }} Riels</p>
              <p class="mb-2 pro-discount">Discount: {{ product.discount }}</p>
              <div class="d-flex justify-content-start mb-3">
                <i v-for="n in 4" :key="n" class="material-icons me-1 star-icon">star</i>
              </div>
              <button type="button" class="btn btn-success">Chat Now</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- {{ store.products.data }} -->
</template>

<script>
import { ref, computed, onMounted } from 'vue'
import { useProductsStore } from '@/stores/products-lists.ts'

export default {
  name: 'ListCardProduct',
  data() {
    return {
      store: useProductsStore()
    }
  },
  mounted() {
    this.fetchProducts()
  },
  methods: {
    fetchProducts() {
      this.store.fetchProducts()
    }
  }
}
</script>

<style scoped>
.container {
  margin-top: 20px;
}

.card {
  height: 200px;
  transition: transform 0.3s, box-shadow 0.3s;
  background-color: #ffffff;
  border-radius: 15px;
  overflow: hidden;
  border: 1px solid #e0e0e0;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.image-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 200px;
  background-color: #f8f9fa;
  border-radius: 10px;
  overflow: hidden;
}

.product-image {
  max-width: 100%;
  max-height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease-in-out;
}

.product-image:hover {
  transform: scale(1.1);
}

.card-content {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 20%;
}

.pro-name {
  font-size: 20px;
  color: #333;
  word-break: break-word;
  overflow-wrap: break-word;
}

.view-detail {
  font-size: 24px;
  color: #6c757d;
  cursor: pointer;
  transition: color 0.3s;
}

.view-detail:hover {
  color: #28a745;
}

.pro-price {
  color: #018001;
  font-size: 18px;
  margin-top: -1rem;
}

.seller-part {
  color: #6c757d;
}

.btn {
  background-color: #28a745;
  border-color: #28a745;
  font-weight: bold;
  padding: 8px 16px;
  color: #fff;
  transition: transform 0.3s, box-shadow 0.3s;
}

.btn:hover {
  background-color: #218838;
  border-color: #218838;
  transform: translateY(-2px);
  box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}

.star-icon {
  color: #ffa534;
}

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
  transition: opacity 0.3s ease;
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
  max-width: 50%;
  height: 50%;
  margin-bottom: 20px;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: scale(0.9);
  }
  to {
    opacity: 1;
  }
}
</style>