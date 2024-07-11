<template>
  <WebLayout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex justify-content-between align-items-center">
            <h5 style="margin-top: 17rem">បញ្ជីផលិតផល</h5>
            <!-- Search Products -->
            <div class="search-wrapper">
              <input
                type="search"
                v-model="searchText"
                class="form-control search-input"
                placeholder="ស្វែងរកផលិតផល..."
                aria-label="Search"
                aria-describedby="search-addon"
              />
              <i class="material-icons search-icon">search</i>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div
          class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4"
          v-for="product in fetchProducts"
          :key="product.id"
        >
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
                <i class="material-icons view-detail" @click="openModal(product)">visibility</i>
              </div>
              <div class="d-flex flex-column justify-content-between seller-part h-100">
                <p class="mb-2 fw-bold pro-price">{{ formatPrice(product.price) }}</p>
                <p class="mb-2 pro-discount">បញ្ចុះតម្លៃ: {{ product.discount }}</p>
                <button type="button" class="btn btn-success">Chat Now</button>
              </div>
            </div>
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
            <div class="col-12 col-md-6 d-flex justify-content-center align-items-center">
              <img
                v-if="selectedProduct.image"
                :src="`http://127.0.0.1:8000/products_images/${selectedProduct.image}`"
                :alt="selectedProduct.name"
                class="product-image-large img-fluid"
              />
            </div>
            <div class="col-12 col-md-6 mt-4 mt-md-0">
              <p class="card-title fs-5">Name: {{ selectedProduct.name }}</p>
              <p class="card-price mt-3 fs-5 text-dark">
                Price: {{ formatPrice(selectedProduct.price) }}
              </p>
              <p class="card-cate fs-5">Category: {{ selectedProduct.category.name }}</p>
              <p class="card-quan fs-5">
                Quantity:
                {{ selectedProduct.stock.quantity + ' ' + selectedProduct.stock.stock_type.name }}
              </p>
              <p class="card-cate fs-5">Discount: {{ selectedProduct.discount }}</p>
              <p class="card-desc fs-5">Description: {{ selectedProduct.description }}</p>
            </div>
          </div>
        </div>
      </div>
      {{ productStore.products }}
      {{ category_id }}
    </div>
  </WebLayout>
</template>

<script>
import { ref, computed, onMounted } from 'vue'
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import { useProductsStore } from '@/stores/products-lists.ts'
import { useRoute } from 'vue-router'
import { categoryProStore } from '@/stores/product-in-category.ts'
export default {
  name: 'ProductEachCate',
  components: {
    WebLayout
  },
  setup() {
    const store = useProductsStore()
    const productStore = categoryProStore()
    const showModal = ref(false)
    const selectedProduct = ref(null)
    const searchText = ref('')
    let categoryId = ref(null)
    const route = useRoute()
    const category_id = route.query.categoryId

    onMounted(() => {
      fetchData()
    })

    const fetchData = async () => {
      try {
        await productStore.fetchCategory(category_id)
      } catch (error) {
        console.error('Error fetching user data:', error)
      }
    }
    onMounted(async () => {
      categoryId.value = new URLSearchParams(window.location.search).get('categoryId')
      if (categoryId.value) {
        await fetchProducts(categoryId.value)
      } else {
        console.error('Category ID not found in URL parameters.')
      }
    })

    const fetchProducts = async (categoryId) => {
      try {
        await store.fetchProductsByCategory(categoryId)
        // console.log('Products fetched:', store.products.data)
      } catch (error) {
        console.error('Error fetching products:', error)
      }
    }

    const filteredProducts = computed(() => {
      if (!searchText.value.trim()) {
        return store.products.data
      }
      const searchTextLC = searchText.value.trim().toLowerCase()
      return store.products.data.filter(
        (product) =>
          product.name.toLowerCase().includes(searchTextLC) ||
          product.price.toString().includes(searchTextLC)
      )
    })

    const openModal = (product) => {
      selectedProduct.value = product
      showModal.value = true
    }

    const closeModal = () => {
      showModal.value = false
      selectedProduct.value = null
    }

    const formatPrice = (price) => {
      return new Intl.NumberFormat().format(price) + ' Riels'
    }

    onMounted(async () => {
      this.productStore.fetchCategory(this.category_id)
      console.log(this.productStore)
    })

    return {
      showModal,
      selectedProduct,
      searchText,
      fetchProducts,
      filteredProducts,
      openModal,
      closeModal,
      formatPrice,
      productStore: categoryProStore()
    }
  }
}
</script>

<style scoped>
.container {
  margin-top: -8rem;
}
.search-wrapper {
  position: relative;
  width: 400px; /* Adjust the width as needed */
  margin-top: 15rem;
}

.search-input {
  width: 100%;
  height: 50px;
  padding: 0 50px 0 20px;
  border: 2px solid #ddd;
  border-radius: 25px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  transition: all 0.3s ease;
}

.search-input:focus {
  border-color: #28a745;
  box-shadow: 0 0 10px rgba(40, 167, 69, 0.2);
  outline: none;
}

.search-icon {
  position: absolute;
  top: 50%;
  right: 20px;
  transform: translateY(-50%);
  font-size: 2rem;
  color: #aaa;
  transition: color 0.3s ease;
  cursor: pointer;
}

.search-icon:hover {
  color: #28a745;
}
.card {
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

.pro-discount {
  margin-top: -0.7rem;
}

.product-image:hover {
  transform: scale(1.1);
}

.card-content {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  height: 50%;
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
  }
}

@media (max-width: 576px) {
  .card {
    height: auto;
  }
}
</style>
