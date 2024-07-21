<template>
  <WebLayout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
<<<<<<< HEAD
          <div class="d-flex justify-content-between align-items-center ">
            <!-- <h4 style="margin-top: 17rem" class="fw-bold">{{ products.products.data }}</h4> -->
=======
          <div class="d-flex justify-content-between align-items-center">
            <h4 style="margin-top: 17rem" class="fw-bold">បញ្ជីផលិតផល</h4>
>>>>>>> 41c5113fe14265e4108c5703c63fa5b34bccfb71
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
<<<<<<< HEAD
      <div class="m-3">
        <div v-if="products.products.numberOfProduct > 0" class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 mt-4">
          <div v-for="product in products.products.data.products" :key="product.id" class="col">
            <div v-if="product != ''" class="card rounded-2 p-4 shadow-sm h-100">
              <div class="image-container rounded-2 mb-3">
                <img v-if="product.image" :src="`http://127.0.0.1:8000/storage/${product.image}`"
                  :alt="product.name" class="product-image" />
              </div>
              <div class="card-content">
                <div class="d-flex justify-content-between mb-3">
                  <h5 class="pro-name fw-bold">{{ product.name }}</h5>
                  <i class="material-icons view-detail" @click="openModal(product)">visibility</i>
=======

      <div v-if="products.products.numberOfProduct > 0" class="container mt-5 mb-5">
        <div class="row justify-content-center g-3">
          <div
            v-for="product in products.products.data.products"
            :key="product.id"
            class="col-12 col-sm-6 col-md-4 col-lg-3"
          >
            <router-link :to="{ name: 'detail', params: { id: product.id } }" class="text-decoration-none">
              <div v-if="product != ''" class="card rounded-2 shadow-sm h-100 position-relative">
                <div
                  class="d-flex justify-content-center align-items-center bg-light rounded-top"
                  style="height: 165px"
                >
                  <img
                    v-if="product.image"
                    :src="`http://127.0.0.1:8000/storage/${product.image}`"
                    :alt="product.name"
                    class="card-img-top product-image mt-4"
                    style="width: 60%; height: 130px; object-fit: cover"
                  />
>>>>>>> 41c5113fe14265e4108c5703c63fa5b34bccfb71
                </div>
                <div
                  class="card-body d-flex flex-column justify-content-between text-center flex-grow-1"
                >
                  <h5 class="card-title mt-0">{{ product.name }}</h5>
                  <p
                    class="card-text fw-bold text-white ml-20"
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
      <div
        v-else-if="products.products.numberOfProduct == 0"
        class="justify-content-center align-items-center vh-100"
      >
        <div class="card p-5 w-100 text-center border-0 shadow-sm">
          <h4 class="fw-bold text-danger" style="font-family: 'Arial Black', sans-serif">
            មិនទាន់មានផលិតផលទេ
          </h4>
          <p class="fs-5 text-muted">Check back later or explore other categories!</p>
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<script>
import { ref, computed, onMounted, watch } from 'vue'
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import { useProductsStore } from '@/stores/products-lists.ts'
import { useRoute } from 'vue-router'

export default {
  name: 'ProductEachCate',
  components: {
    WebLayout
  },

  setup() {
    const route = useRoute()
    const id = route.params.id
    const products = useProductsStore()
    const searchText = ref('')

    onMounted(async () => {
      await products.fetchCategory(id)
    })

    const filteredProducts = computed(() => {
      return products.items.filter((product) =>
        product.name.toLowerCase().includes(searchText.value.toLowerCase())
      )
    })

    watch(searchText, () => {
      products.searchProduct(searchText.value)
    })

    return {
      products,
      searchText,
      filteredProducts,
      id
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
  width: 400px;
  /* Adjust the width as needed */
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
  transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

.product-image {
  width: 100%;
  height: 120px;
  object-fit: contain;
  max-width: 100%;
  max-height: 100%;
  border-top-left-radius: 0.25rem;
  border-top-right-radius: 0.25rem;
}

.pro-name {
  font-size: 1rem;
  font-weight: bold;
  text-transform: capitalize;
}

.pro-price {
  font-size: 1rem;
  color: green;
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