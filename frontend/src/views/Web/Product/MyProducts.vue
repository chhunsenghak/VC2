<template>
  <WebLayout>
    <div class="container d-flex mt-30 justify-content-between mb-10">
      <UserInfo :userStore="userStore"></UserInfo>
      <ListProducts :productsStore="store" />
    </div>
  </WebLayout>
</template>

<script>
import { userStore } from '@/stores/my-product'
import { useAuthStore } from '@/stores/auth-store'
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import ListProducts from '@/Components/MyProduct/ListProducts.vue'
import UserInfo from '@/Components/MyProduct/UserInfo.vue'

export default {
  components: {
    WebLayout,
    ListProducts,
    UserInfo
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

</style>
