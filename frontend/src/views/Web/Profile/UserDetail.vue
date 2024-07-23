<template>
  <WebLayout>
    <div class="container mt-23" >
      <div class="card cover-background"></div>
      <div class="user-info d-flex" v-for="(value, key) in userInfo" :key="key" > 
        <!-- Profile Image -->
        <div class="user-info-item w-100 p-5" v-if="key === 'profile'">
          <img
            :src="`http://127.0.0.1:8000/storage/${value}`"
            class="rounded-circle w-40 h-40"
            style="border: 10px solid white; margin-top: -32rem; margin-left: 7rem"
          />
        </div>
        <!-- Name -->
        <div class="user-info-item mt-50" v-else-if="key === 'name'">
          <span class="user-info-value fw-bold fs-4" style="margin-left: 11rem; margin-top: 7rem">{{
            value
          }}</span>
        </div>
        <!-- Bio -->
        <div class="user-info-item" v-else-if="key === 'bio'">
          <span class="user-info-value fs-6" style="margin-left: 11rem; margin-top: -1rem">{{
            value
          }}</span>
        </div>
        <!-- Social Media Links -->
        <div
          class="user-info-item d-flex flex-column"
          style="margin-left: 65rem"
          v-else-if="key === 'facebook'"
        >
          <span class="user-info-label mb-3 fs-6" style="margin-top: -8rem">Social Medias</span>
          <a
            class="user-info-value d-flex align-items-center text-decoration-none text-primary fs-4"
            :href="value"
            target="_blank"
          >
            <i class="fab fa-facebook-square me-2"></i>
          </a>
        </div>
        <div
          class="user-info-item"
          style="margin-left: 20rem; margin-top: 3rem"
          v-else-if="key === 'linkenin'"
        >
          <a
            class="user-info-value d-flex align-items-center text-decoration-none text-primary fs-5"
            :href="value"
            target="_blank"
          >
            <i
              class="fab fa-linkedin fa-lg me-2"
              style="margin-left: 50rem; margin-top: -12rem"
            ></i>
          </a>
        </div>
        <div class="user-info-item" v-else-if="key === 'telegram'">
          <a
            class="user-info-value d-flex align-items-center text-decoration-none text-primary fs-4"
            :href="'https://t.me/' + value"
            target="_blank"
          >
            <i
              class="fab fa-telegram me-2 text-primary fs-4"
              style="margin-left: 65rem; margin-top: -11rem"
            ></i>
          </a>
        </div>
        <div
          class="user-info-item"
          style="margin-left: 63rem; display: flex; align-items: center; margin-top: -8rem"
          v-else-if="key === 'phone'"
        >
          <i class="fas fa-phone me-2 fs-6 text-success"></i>
          <span class="user-info-value fw-bold">{{ value }}</span>
        </div>
        <!-- Location -->
        <div v-else-if="key === 'location_id'" class="mb-2" >
          <a
            :href="
              'https://www.google.com/maps/search/?api=1&query=' +
              encodeURIComponent(
                product.frontuser.location.latitude + ',' + product.frontuser.location.longitude
              )
            "
            target="_blank"
            class="btn w-100 border mb-1"
          >
            <i class="fas fa-map-marker-alt"> View on map</i>
          </a>
          <div id="map" style="width: 290px; height: 150px"></div>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 mb-5" style="margin-top: -10rem;">
        <!-- Changed col classes and adjusted g-3 -->
        <div v-for="product in store.productList.data" :key="product.id" class="col-4">
          <div class="card rounded-5 d-flex flex-column">
            <router-link
              :to="{ name: 'detail', params: { id: product.id } }"
              class="text-decoration-none"
            >
              <img
                v-if="product.image"
                :src="`http://127.0.0.1:8000/storage/${product.image}`"
                :alt="product.name"
                class="card-img-top rounded-8 product-image"
                style="width: 100%; height: 200px; object-fit: cover"
              />
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
            </router-link>
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
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<script>
import { ref, onMounted, watch } from 'vue'
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import { useRoute } from 'vue-router'
import { userStore } from '@/stores/my-product'

export default {
  name: 'ListCardProduct',
  components: { WebLayout },
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
    const store = userStore()
    const productById = ref(null)
    const userInfo = ref(null)

    const fetchProductById = async (id) => {
      productById.value = await store.productList(id)
      store.productList.data.forEach((element) => {
        userInfo.value = element.frontuser
      })
      if (userInfo.value.location) {
        initMap(userInfo.value.location.latitude, userInfo.value.location.longitude)
      }
    }

    const initMap = (latitude, longitude) => {
      const map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: { lat: parseFloat(latitude), lng: parseFloat(longitude) }
      })

      new google.maps.Marker({
        position: { lat: parseFloat(latitude), lng: parseFloat(longitude) },
        map: map
      })
    }

    onMounted(() => {
      if (route.params.id) {
        fetchProductById(route.params.id)
      }
    })

    watch(
      () => route.params.id,
      (newId) => {
        if (newId) {
          fetchProductById(newId)
        }
      }
    )

    return {
      productById,
      store,
      userInfo
    }
  }
}
</script>

<style scoped>
.cover-background {
  position: absolute;
  top: 0;
  left: 0;
  width: 80%;
  height: 250px; /* Adjust as needed */
  background: linear-gradient(135deg, #a6e756 0%, #226802 100%);
  z-index: -1;
  margin-left: 9rem;
  border: none;
}

.user-card {
  background-color: #f5f5f5;
  border-radius: 8px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  padding: 16px;
}

.user-info {
  display: flex;
  flex-wrap: wrap;
  margin-bottom: 12px;
}

.user-info-item {
  display: flex;
  align-items: center;
  margin-right: 16px;
}

.user-info-label {
  font-weight: bold;
  margin-right: 4px;
}

.user-info-value {
  color: #555;
}

.user-info-value a {
  color: #007bff;
  text-decoration: none;
}

.user-info-value a:hover {
  text-decoration: underline;
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
