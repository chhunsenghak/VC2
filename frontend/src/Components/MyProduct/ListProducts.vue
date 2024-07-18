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
      <h5 class="fw-bold">ផលិតផលរបស់ខ្ញុំ</h5>
      <div class="w-38" style="border-bottom: 2px solid green;"></div>
      <form-update-product v-if="isDialogOpen" :product="selectedProduct" @close="closeDialog" @submit="submitProduct"
        class="overlay"></form-update-product>

      <div class="mt-4 ">


        <table class="table table-bordered">
          <thead class="table-success ">
            <tr>
              <th scope="col">ល.រ</th>
              <th scope="col">ឈ្មោះ</th>
              <th scope="col">តម្លៃ</th>
              <th scope="col">ប្រភេទ</th>
              <th scope="col">ថ្ងៃផុសទំនិញ</th>
              <th scope="col">រូបភាព</th>
              <th scope="col">ពិពណ៍នា</th>
              <th scope="col">សមកម្មភាព</th>
            </tr>
          </thead>
          <tbody v-for="product in store.products.data" :key="product.id">
            <tr>
              <th scope="row">{{ product.id }}</th>
              <td>{{ product.name }}</td>
              <td>{{ product.price }}</td>
              <td>{{ product.category.name }}</td>
              <td>{{ product.created_at }}</td>
              <td>
                <img class="card-img-top w-10 h-10 " :src="`http://127.0.0.1:8000/storage/${product.image}`"
                  alt="image product" style="border-radius: 50%;" />
              </td>
              <td>{{ product.description }}</td>
              <td>
                <button class="btn" @click="deleteProduct(product.id)"><i
                    class="material-icons text-danger me-3">delete</i></button>
                <i class="material-icons text-success" @click="openDialog(product)">edit</i>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- end product  -->
    </div>
    <!-- create card to confirm that we do not have product yet -->
    <div v-else class="row col-8">
      <form-create-product></form-create-product>
      <div class="d-flex justify-content-center" style="margin-left: 15rem;">
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
      // Handle the update logic here
      this.closeDialog()
    },
    // formattedDate(date) {
    //   return moment(date).format('YYYY-MM-DD HH:mm:ss')
    // }
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