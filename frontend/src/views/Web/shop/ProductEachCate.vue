<template>
  <WebLayout>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="d-flex justify-content-between align-items-center">
            <h4 style="margin-top: 17rem" class="fw-bold">បញ្ជីផលិតផល</h4>
          </div>
        </div>
      </div>

      <div v-if="products.products.numberOfProduct > 0" class="container mt-2 mb-5">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mt-3 mb-15">
          <div
            v-for="product in products.products.data.products"
            :key="product.id"
            class="col-12 col-sm-6 col-md-4 col-lg-3 rounded-5"
          >
            <router-link
              :to="{ name: 'detail', params: { id: product.id } }"
              class="text-decoration-none"
            >
              <div v-if="product != ''" class="card shadow-sm rounded-8 h-100 position-relative">
                <div
                  class="d-flex justify-content-center align-items-center bg-light rounded-top"
                  style="height: 165px"
                >
                  <img
                    v-if="product.image"
                    :src="`http://127.0.0.1:8000/storage/${product.image}`"
                    :alt="product.name"
                    class="card-img-top rounded-8 product-image"
                    style="width: 100%; height: 200px; object-fit: cover"
                  />
                </div>
                <div class="card-body d-flex flex-column justify-content-between flex-grow-1">
                  <small class="text-muted text-truncate" style="margin-top: -15px">{{
                    getFormattedTime(product.created_at)
                  }}</small>
                  <div class="d-flex justify-content-between">
                    <p class="card-title text-success text-wrap mt-0">
                      <b>{{ product.name }}</b>
                    </p>
                    <p class="card-text text-success fw-bold">{{ product.price }} រៀល</p>
                  </div>
                </div>
                <div
                  class="pl-3 border shadow-sm rounded-8 pr-3 d-flex justify-content-between"
                  style="margin-top: -15px"
                >
                  <div class="d-flex align-items-center gap-1">
                    <img
                      :src="`http://127.0.0.1:8000/storage/${product.frontuser.profile}`"
                      class="w-10 shadow-sm rounded-circle"
                      alt=""
                    />
                    <p class="card-text mb-0">{{ product.frontuser.name }}</p>
                  </div>
                  <div class="p-2 d-flex gap-2" style="font-size: 26px">
                    <a
                      v-if="product.frontuser.facebook !== null"
                      :href="'https://www.facebook.com/' + product.frontuser.facebook"
                      target="_blank"
                      class="social-link"
                    >
                      <i class="fab fa-facebook-square"></i>
                    </a>
                    <a
                      v-if="product.frontuser.telegram !== null"
                      :href="'https://t.me/' + product.frontuser.telegram"
                      target="_blank"
                      class="social-link"
                    >
                      <i class="fab fa-telegram"></i>
                    </a>
                    <a
                      v-if="product.frontuser.linkedin !== null"
                      :href="'https://www.linkedin.com/in/' + product.frontuser.linkedin"
                      target="_blank"
                      class="social-link"
                    >
                      <i class="fab fa-linkedin"></i>
                    </a>
                  </div>
                </div>
              </div>
            </router-link>
          </div>
        </div>
      </div>
      <div
        v-else-if="products.products.numberOfProduct == 0"
        class="justify-content-center align-items-center"
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
  methods: {
    getFormattedTime(timestamp) {
      const daysOfWeek = [
        'Sunday',
        'Monday',
        'Tuesday',
        'Wednesday',
        'Thursday',
        'Friday',
        'Saturday'
      ]

      const currentDate = new Date()
      const inputDate = new Date(timestamp)

      // Get components for current date
      const currentDay = currentDate.getDate()
      const currentMonth = currentDate.getMonth()
      const currentYear = currentDate.getFullYear()

      // Get components for input date
      const inputDay = inputDate.getDate()
      const inputMonth = inputDate.getMonth()
      const inputYear = inputDate.getFullYear()

      // Compare date parts
      if (currentYear === inputYear && currentMonth === inputMonth && currentDay === inputDay) {
        // Today: Show only time
        const hours = inputDate.getHours()
        const minutes = inputDate.getMinutes().toString().padStart(2, '0')
        const amPm = hours >= 12 ? 'PM' : 'AM'
        const formattedHours = hours % 12 || 12
        return `${formattedHours}:${minutes} ${amPm}`
      } else if (
        currentYear === inputYear &&
        currentMonth === inputMonth &&
        currentDay - inputDay === 1
      ) {
        // Yesterday: Show 'Yesterday'
        return 'Yesterday'
      } else {
        // Other days: Show full date and time
        const dayOfWeek = daysOfWeek[inputDate.getDay()]
        const dayOfMonth = inputDate.getDate()
        const month = inputDate.toLocaleString('default', { month: 'long' })
        const year = inputDate.getFullYear()
        const hours = inputDate.getHours()
        const minutes = inputDate.getMinutes().toString().padStart(2, '0')
        const amPm = hours >= 12 ? 'PM' : 'AM'
        const formattedHours = hours % 12 || 12
        return `${dayOfWeek}, ${month} ${dayOfMonth}, ${year} - ${formattedHours}:${minutes} ${amPm}`
      }
    }
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