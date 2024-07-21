<template>
  <WebLayout>
    <!-- Cover Background -->
    <div class="container mt-23">
      <div class="card cover-background"></div>
      <div class="user-info d-flex" v-for="(value, key) in userInfo" :key="key">
        <div class="user-info-item w-100 p-5" v-if="key === 'profile'">
          <img
            :src="`http://127.0.0.1:8000/storage/${value}`"
            class="rounded-circle w-40 h-40"
            style="border: 10px solid white; margin-top: -42rem; margin-left: 7rem"
          />
        </div>

        <div class="user-info-item mt-50" v-else-if="key === 'name'">
          <span class="user-info-value fw-bold fs-4" style="margin-left: 11rem; margin-top: 7rem">{{
            value
          }}</span>
        </div>
        <div class="user-info-item" v-else-if="key === 'bio'">
          <span class="user-info-value fs-6" style="margin-left: 9rem; margin-top: -1rem">{{
            value
          }}</span>
        </div>

        <div
          class="user-info-item d-flex flex-column"
          style="margin-left: 65rem"
          v-else-if="key === 'facebook'"
        >
          <span class="user-info-label mb-3 fs-6" style="margin-top: -10rem">Social Medias</span>
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
              style="margin-left: 65rem; margin-top: -15rem"
            ></i>
          </a>
        </div>
        <div
          class="user-info-item"
          style="margin-left: 63rem; display: flex; align-items: center; margin-top: -10rem"
          v-else-if="key === 'phone'"
        >
          <i class="fas fa-phone-alt me-2 fs-5 text-success"></i>
          <span class="user-info-value fw-bold">{{ value }}</span>
        </div>
        <div
          class="user-info-item"
          v-else-if="key === 'address'"
          style="display: flex; align-items: center; margin-left: 35rem; margin-top: -5rem"
        >
          <a
            :href="'https://www.google.com/maps/search/?api=1&query='"
            target="_blank"
            class="text-decoration-none text-primary"
          >
            <i class="fas fa-map-marker-alt me-2 fs-4"></i>
            <span class="user-info-value">{{ value }}</span>
          </a>
        </div>
      </div>
      <div class="row mb-5" style="width: 90%; margin-left: 4rem; margin-top: -11rem">
        <hr />
        <h4 class="mt-4 fw-bold">ផលិតផលទាំងអស់</h4>
        <div class="col-md-3" v-for="product in store.productList.data" :key="product.id">
          <router-link
            :to="{ name: 'detail', params: { id: product.id } }"
            class="text-decoration-none"
          >
            <div class="card mb-5 mt-10">
              <img
                v-if="product.image"
                :src="`http://127.0.0.1:8000/storage/${product.image}`"
                :alt="product.name"
                class="card-img-top product-image mt-4"
                style="width: 70%; height: 130px; object-fit: cover"
              />
              <div
                class="card-body d-flex flex-column justify-content-between text-center flex-grow-1"
              >
                <h5 class="card-title mt-0">{{ product.name }}</h5>
                <p
                  class="card-text fw-bold text-white ml-15"
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
    }

    onMounted(() => {
      if (route.params.id) {
        fetchProductById(route.params.id)
      }
    })

    watch(() => route.params.id, (newId) => {
      if (newId) {
        fetchProductById(newId)
      }
    })

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
  margin: auto;
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
