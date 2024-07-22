<template>
  <button type="button" class="btn btn-primary d-none" @click="showToast">Show live toast</button>
  <!-- Toast container -->
  <div class="toast-container position-fixed top-17 end-0 p-3">
    <div id="liveToast" class="toast bg-primary text-white" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">Notification</strong>
        <small class="text-muted">Now</small>
        <button type="button" class="btn-close" @click="hideToast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Product Deleted
      </div>
    </div>
  </div>
  <div class="container">
    <div v-if="store.products.data != ''" class="row ">
      <form-create-product>
      </form-create-product>
      <form-update-product v-if="isDialogOpen" :product="selectedProduct" @close="closeDialog" @submmit="submitProduct"
        class="overlay">
      </form-update-product>
      <div class="mt-4 ">
        <table class="table table-bordered">
          <thead class="table-success ">
            <tr>
              <th>ឈ្មោះ</th>
              <th>តម្លៃ</th>
              <th>ប្រភេទ</th>
              <th>ថ្ងៃផុសទំនិញ</th>
              <th>រូបភាព</th>
              <th>ពិពណ៍នា</th>
              <th>សកម្មភាព</th>
            </tr>
          </thead>
          <tbody v-for="product in store.products.data" :key="product.id">
            <tr>
              <td>{{ product.name }}</td>
              <td>{{ product.price }} រៀល</td>
              <td>{{ product.category.name }}</td>
              <td>{{ product.created_at }}</td>
              <td class="p-0">
                <img class="w-10" :src="`http://127.0.0.1:8000/storage/${product.image}`" alt="image product" />
              </td>
              <td>{{ product.description }}</td>
              <td class="d-flex justify-content-end gap-1">
                <button class="btn​ btn-primary rounded shadow-none" @click="openDialog(product)">កែ</button>
                <button class="btn btn-danger" @click="deleteProduct(product.id)">លុប</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- end product  -->
    </div>
    <!-- create card to confirm that we do not have product yet -->
    <div v-else-if="store.products.data == ''" class="row col-12">
      <form-create-product></form-create-product>
      <div class="d-flex justify-content-center align-items-center">
        <div class="card text-center">
          <div class="card-header fw-bold">
            ព័ត៌មាន​អំពី​ផលិតផល
          </div>
          <div class="card-body">
            <img src="../../image/empty-cart.png" width="250px">
            <h5 class="card-title">មិនមានផលិតផលនោះទេ</h5>
            <p class="card-text">បច្ចុប្បន្ននេះ អ្នកមិនទាន់មានព័ត៌មានអំពីផលិតផលណាមួយទេ</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import FormCreateProduct from '/src/Components/MyProduct/FormCreateProduct.vue'
import FormUpdateProduct from '/src/Components/MyProduct/FormUpdateProduct.vue'
import { userStore } from '@/stores/my-product'
import { useAuthStore } from '@/stores/auth-store'
export default {
  components: {
    FormCreateProduct,
    FormUpdateProduct
  },
  name: 'NoProductCard',
  mounted() {
    this.fetchData()
    setInterval(() => {
      this.fetchData()
    }, 2000)
  },
  data() {
    return {
      isDialogOpen: false,
      selectedProduct: null,
      store: userStore(),
      userStore: useAuthStore()
    }
  },
  methods: {
    fetchData() {
      this.store.fetchUser(this.userStore.user.id)
    },
    openDialog(product) {
      this.selectedProduct = product
      this.isDialogOpen = true
    },
    closeDialog() {
      this.isDialogOpen = false
      this.selectedProduct = null
    },
    submitProduct(updatedProduct) {
      this.closeDialog()
    },
    deleteProduct(id) {
      this.deletePro(id)
    },
    async deletePro(id) {
      this.store.deleteProduct(id)
      this.fetchData()
      this.showToast()
      setTimeout(() => {
        this.store.fetchProducts()
        this.hideToast()
      }, 2500)
    },
    showToast() {
      // Initialize Bootstrap toast using Vue's nextTick to ensure DOM update
      this.$nextTick(() => {
        var bsToast = new bootstrap.Toast(document.getElementById('liveToast'));
        bsToast.show();
      });
    },
    hideToast() {
      // Optional: Handle hiding the toast if needed
      var bsToast = new bootstrap.Toast(document.getElementById('liveToast'));
      bsToast.hide();
    }
  }
}
</script>
<style scoped>
.toast-container {
  z-index: 1050;
  /* Ensure toast appears above other content */
}
</style>