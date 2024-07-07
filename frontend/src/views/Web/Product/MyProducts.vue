<template>
  <WebLayout>
    <div class="container mt-20 flex">
      <div class="col-lg-3 bg-danger">
        <div class="intro-excerpt">
          <h1>Let buy together <span clsas="d-block">everyone</span></h1>
          <p class="mb-4">
            Let enjoy to visit Phsarkasekor. Let buy something we have everything here (Fruit, Meat,
            Vegetable...)
          </p>
        </div>
      </div>
      <div class="col-lg-9 bg-success">hello</div>
    </div>
    {{ store.products }}
    {{ userStore.user }}
  </WebLayout>
</template>

<script>
import { userStore } from '@/stores/my-product' // Adjust the path as needed
import { useAuthStore } from '@/stores/auth-store'
import WebLayout from '@/Components/Layouts/WebLayout.vue' // Adjust the path as needed

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
    this.fetchData() // Fetch data on component mount
  },

  methods: {
    fetchData() {
      // Fetch data from the store here, for example:
      this.store.fetchUser(this.userStore.user.id) // Adjust the method name as needed
    }
  }
}
</script>
