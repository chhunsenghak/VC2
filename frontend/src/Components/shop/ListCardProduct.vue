<template>
  <div class="container">
    <div class="row mb-4">
      <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
          <h5 class="fw-bold">បញ្ជីផលិតផល</h5>
          <!-- Search Products -->
          <div class="search-wrapper">
            <input type="search" v-model="searchText" class="form-control search-input" placeholder="ស្វែងរកផលិតផល..."
              aria-label="Search" aria-describedby="search-addon" />
            <i class="material-icons search-icon">search</i>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mt-5 mb-5">
      <!-- Changed col classes and adjusted g-3 -->
      <div v-for="product in filteredProducts" :key="product.id" class="col-4">
        <div class="card rounded-5 d-flex flex-column">
          <router-link :to="{ name: 'detail', params: { id: product.id } }" class="text-decoration-none">
            <img v-if="product.image" :src="`http://127.0.0.1:8000/storage/${product.image}`" :alt="product.name"
              class="card-img-top rounded-8 product-image" style="width: 100%; height: 200px; object-fit: cover" />
            <img v-else src="../../assets/image/placeholder.png" class="img-fluid rounded-top-5"
              alt="Don't have Product Image" :width="300" :height="300">
            <div class="card-body d-flex flex-column justify-content-between  flex-grow-1">
              <small class="text-muted text-truncate" style="margin-top: -15px;">{{ getFormattedTime(product.created_at)
                }}</small>
              <div class="d-flex justify-content-between">
                <p class="card-title text-success text-wrap mt-0"><b>{{ product.name }}</b></p>
                <p class="card-text text-success fw-bold">
                  {{ product.price }} រៀល
                </p>
              </div>
            </div>
          </router-link>

          <div class="pl-3 border shadow-sm rounded-8 pr-3 d-flex justify-content-between" style="margin-top: -15px">
            <div class="d-flex align-items-center gap-1">
              <img :src="`http://127.0.0.1:8000/storage/${product.frontuser.profile}`"
                class="w-10 shadow-sm rounded-circle" alt="">
              <p class="card-text mb-0">{{ product.frontuser.name }}</p>
            </div>
            <div class="p-2 d-flex gap-2" style="font-size: 26px">
              <a v-if="product.frontuser.facebook !== null"
                :href="'https://www.facebook.com/' + product.frontuser.facebook" target="_blank" class="social-link">
                <i class="fab fa-facebook-square "></i>
              </a>
              <a v-if="product.frontuser.telegram !== null" :href="'https://t.me/' + product.frontuser.telegram"
                target="_blank" class="social-link">
                <i class="fab fa-telegram"></i>
              </a>
            </div>
          </div>
        </div>
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
    },
    getFormattedTime(timestamp) {
      const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

      const currentDate = new Date();
      const inputDate = new Date(timestamp);

      // Get components for current date
      const currentDay = currentDate.getDate();
      const currentMonth = currentDate.getMonth();
      const currentYear = currentDate.getFullYear();

      // Get components for input date
      const inputDay = inputDate.getDate();
      const inputMonth = inputDate.getMonth();
      const inputYear = inputDate.getFullYear();

      // Compare date parts
      if (currentYear === inputYear && currentMonth === inputMonth && currentDay === inputDay) {
        // Today: Show only time
        const hours = inputDate.getHours();
        const minutes = inputDate.getMinutes().toString().padStart(2, '0');
        const amPm = hours >= 12 ? 'PM' : 'AM';
        const formattedHours = hours % 12 || 12;
        return `${formattedHours}:${minutes} ${amPm}`;
      } else if (currentYear === inputYear && currentMonth === inputMonth && currentDay - inputDay === 1) {
        // Yesterday: Show 'Yesterday'
        return 'ម្សិលមិញ';
      } else {
        // Other days: Show full date and time
        const dayOfWeek = daysOfWeek[inputDate.getDay()];
        const dayOfMonth = inputDate.getDate();
        const month = inputDate.toLocaleString('default', { month: 'long' });
        const year = inputDate.getFullYear();
        const hours = inputDate.getHours();
        const minutes = inputDate.getMinutes().toString().padStart(2, '0');
        const amPm = hours >= 12 ? 'PM' : 'AM';
        const formattedHours = hours % 12 || 12;
        return `${dayOfWeek}, ${month} ${dayOfMonth}, ${year} - ${formattedHours}:${minutes} ${amPm}`;
      }
    }
  }
}
</script>

<style scoped>
.container {
  margin-top: 1rem;
  padding: 50px;
}

.search-wrapper {
  position: relative;
  width: 400px;
  /* Adjust the width as needed */
}

.search-input {
  width: 100%;
  height: 50px;
  padding: 0 50px 0 20px;
  border: 2px solid #ddd;
  border-radius: 25px;
  box-shadow: 0 2px 8px rgba(198, 198, 198, 0.1);
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
  width: 90%;
  height: 120px;
  object-fit: contain;
  max-width: 100%;
  max-height: 100%;
  padding: 10px;
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

.price-badge {
  color: #fff;
  border: 1px solid green;
  /* Adjust border color */
  background: green;
  padding: 5px;
  width: 100px;
  border-radius: 10px;
  margin: auto;
  display: inline-block;
  /* Ensures the badge does not expand unnecessarily */
  text-align: center;
  /* Centers the text within the badge */
}
</style>
