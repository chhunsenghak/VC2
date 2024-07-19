<template>
  <div class="container">
    <div class="row mb-4">
      <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="fw-bold">បញ្ជីផលិតផល</h5>
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
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mt-5 mb-5">
      <!-- Changed col classes and adjusted g-3 -->
      <div v-for="product in filteredProducts" :key="product.id" class="col">
        <router-link :to="{ name: 'detail', params: { id: product.id } }"
         class="text-decoration-none">
          <div
            class="card rounded-2 shadow-sm d-flex flex-column align-items-center"
            style="height: 100%"
          >
            <img
              v-if="product.image"
              :src="`http://127.0.0.1:8000/storage/${product.image}`"
              :alt="product.name"
              class="card-img-top product-image mt-4"
              style="width: 80%; height: 130px; object-fit: cover"
            />
            <div
              class="card-body d-flex flex-column justify-content-between text-center flex-grow-1"
            >
              <h5 class="card-title mt-0">{{ product.name }}</h5>
              <p
                class="card-text fw-bold text-white"
                style="
                  border: 1px solid green;
                  padding: 5px;
                  border-radius: 5px;
                  width: 100px;
                  background: green;
                "
              >
                {{ product.price }} រៀល
              </p>
            </div>
            <div
              class="product-description position-absolute d-flex align-items-center justify-content-center"
              v-if="product.description"
            >
              <h6>{{ product.description }}</h6>
            </div>
          </div>
        </router-link>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed } from 'vue'
import { useProductsStore } from '@/stores/products-lists.ts'

export default {
  name: 'ListCardProduct',
  data() {
    return {
      store: useProductsStore(),
      searchText: ''
    }
  },
  mounted() {
    this.fetchProducts()
  },
  computed: {
    filteredProducts() {
      if (!this.searchText.trim()) {
        return this.store.products.data
      }
      const searchTextLC = this.searchText.trim().toLowerCase()
      return this.store.products.data.filter(
        (product) =>
          product.name.toLowerCase().includes(searchTextLC) ||
          product.price.toString().includes(searchTextLC)
      )
    }
  },
  methods: {
    fetchProducts() {
      this.store.fetchProducts()
    },
    formatPrice(price) {
      return new Intl.NumberFormat().format(price) + ' Riels'
    }
  }
}
</script>

<style scoped>
.container {
  margin-top: 10rem;
}

.search-wrapper {
  position: relative;
  width: 400px; /* Adjust the width as needed */
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

.product-image {
  width: 100%;
  height: 120px;
  object-fit: contain;
  max-width: 60%;
  max-height: 100%;
  object-fit: cover;
  transition: transform 0.3s ease-in-out;
}

.card {
  transition: transform 0.3s ease-in-out, box-shadow 0.1s ease-in-out;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(79, 216, 81, 0.15);
}

.product-image:hover {
  transform: scale(1.1);
}

.price-badge {
  color: #fff;
  border: 1px solid green; /* Adjust border color */
  background: green;
  padding: 5px;
  width: 100px;
  border-radius: 10px;
  margin: auto;
  display: inline-block; /* Ensures the badge does not expand unnecessarily */
  text-align: center; /* Centers the text within the badge */
}

.product-description {
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: rgba(79, 106, 79, 0.7);
  color: #fff;
  opacity: 0;
  transition: opacity 0.5s ease-in-out;
  text-align: center;
  padding: 1rem;
  border-radius: 0.25rem;
}

.card:hover .product-description {
  opacity: 1;
}
</style>
