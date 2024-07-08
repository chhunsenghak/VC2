<template>
  <WebLayout>
    <div class="container mt-20">
      <!-- User Profile Card -->
      <div class="card-user-info">
        <div class="card-content">
          <div class="card-img">
            <img src="https://images.rawpixel.com/image_png_800/cHJpdmF0ZS9sci9pbWFnZXMvd2Vic2l0ZS8yMDIyLTA4L2pvYjEwMzQtZWxlbWVudC0wNi0zOTcucG5n.png" alt="user.profile" class="profile-image" />
          </div>
          <div class="card-body">
            <h2 class="card-name">{{ userStore.user.name }}</h2>
            <p class="card-gender">Gender: {{ userStore.user.gender }}</p>
            <p class="card-phone">Phone: {{ userStore.user.phone }}</p>
            <p class="card-email">{{ userStore.user.email }}</p>
          </div>
        </div>
      </div>

      <!-- Product List -->
      <div class="card-products">
        <div v-for="product in store.products.data" :key="product.id" class="product-card">
          <div class="product-image">
            <img src="https://media.istockphoto.com/id/185284489/photo/orange.jpg?s=612x612&w=0&k=20&c=m4EXknC74i2aYWCbjxbzZ6EtRaJkdSJNtekh4m1PspE=" alt="product.image" class="product-image" />
          </div>
          <div class="product-details">
            <h3 class="product-name">{{ product.name }}</h3>
            <p class="product-price">{{ product.price }}</p>
            <p class="product-description">{{ product.description }}</p>
          </div>
        </div>
      </div>
      <!-- {{userStore.user}} -->
      <!-- {{store.products.data}} -->
    </div>
  </WebLayout>
</template>

<script>
import { userStore } from '@/stores/my-product'
import { useAuthStore } from '@/stores/auth-store'
import WebLayout from '@/Components/Layouts/WebLayout.vue'

export default {
  components: {
    WebLayout
  },
  data() {
    return {
      store: userStore(),
      userStore: useAuthStore()
    }
  },
  mounted() {
    this.fetchData()
  },
  methods: {
    fetchData() {
      this.store.fetchUser(this.userStore.user.id)
    }
  }
}
</script>

<style scoped>
.container {
  display: flex;
  justify-content: center;
}

.card-user-info {
  border: 1px solid #ddd;
  border-radius: 10px;
  padding: 20px;
  width: 350px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s;
}

.card-content {
  display: flex;
  align-items: center;
}

.card-img {
  margin-right: 20px;
}

.profile-image {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  border: 2px solid #ddd;
}

.card-body {
  flex: 1; /* To make the card body take remaining space */
}

.card-name {
  font-size: 1.5em;
  font-weight: bold;
  margin-bottom: 10px;
  color: #333;
}

.card-gender,
.card-phone,
.card-email {
  font-size: 1em;
  margin-bottom: 5px;
  color: #666;
}

.product-card {
  display: flex;
  align-items: center;
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 10px;
  transition: transform 0.2s;
  margin-bottom: 0; /* Remove margin bottom to eliminate gap */
}

.product-image {
  width: 80px;
  height: 80px;
  border-radius: 8px;
  object-fit: cover;
  margin-right: 10px;
}

.product-details {
  flex: 1;
}

.product-name {
  font-size: 1.1em;
  font-weight: bold;
  color: #333;
  margin-bottom: 5px;
}

.product-price {
  font-size: 1em;
  color: #666;
  margin-bottom: 5px;
}

.product-description {
  font-size: 0.9em;
  color: #888;
}
</style>
