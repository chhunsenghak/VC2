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
      <div class="toast-body">Product Deleted</div>
    </div>
  </div>
  <div class="container">
    <div v-if="store.products.data != ''" class="row">
      <form-create-product> </form-create-product>
      <form-update-product v-if="isDialogOpen" :product="selectedProduct" @close="closeDialog" @submmit="submitProduct"
        class="overlay">
      </form-update-product>
      <div class="mt-4">
        <table class="table table-bordered">
          <thead class="table-success">
            <tr>
              <th>ឈ្មោះ</th>
              <th>តម្លៃ</th>
              <th>ប្រភេទ</th>
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
              <td class="p-0">
                <img class="w-10" :src="`http://127.0.0.1:8000/storage/${product.image}`" alt="image product"
                  style="margin-left: 12px; margin-top: 12px" @click="showImageModal(product.image)" />
              </td>
              <td>{{ product.description }}</td>
              <td class="d-flex justify-content-end gap-1">
                <button class="btn​ btn-primary rounded shadow-none" @click="openDialog(product)">
                  កែ
                </button>
                <button class="btn btn-danger" @click="deleteProduct(product.id)">លុប</button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <!-- end product  -->
    </div>

    <div class="modal" v-if="showModal" @click.self="showModal = false">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-body">
            <img class="w-100" :src="selectedImage" alt="Selected product image" />
          </div>
        </div>
      </div>
    </div>
    <!-- create card to confirm that we do not have product yet -->
    <div v-else-if="store.products.data == ''" class="row col-12">
      <form-create-product></form-create-product>
      <div class="d-flex justify-content-center align-items-center">
        <div class="card text-center">
          <div class="card-header fw-bold">ព័ត៌មាន​អំពី​ផលិតផល</div>
          <div class="card-body">
            <img src="../../image/empty-cart.png" width="250px" />
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
  components: { FormCreateProduct, FormUpdateProduct },
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
      userStore: useAuthStore(),
      showModal: false,
      selectedImage: null
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
    showImageModal(image) {
      this.selectedImage = `http://127.0.0.1:8000/storage/${image}`
      this.showModal = true
    },
    showToast() {
      this.$nextTick(() => {
        var bsToast = new bootstrap.Toast(document.getElementById('liveToast'))
        bsToast.show()
      })
    },
    hideToast() {
      var bsToast = new bootstrap.Toast(document.getElementById('liveToast'))
      bsToast.hide()
    }
  }
}
</script>

<style scoped>
.toast-container {
  z-index: 1050;
  /* Ensure toast appears above other content */
}

.modal {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
}

.modal-dialog {
  width: 80vw;
  /* Set a fixed width for the modal */
  height: 80vh;
  /* Set a fixed height for the modal */
  max-width: 600px;
  /* Optional: Limit maximum width */
  max-height: 600px;
  /* Optional: Limit maximum height */
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-content {
  width: 100%;
  height: 100%;
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-body {
  width: 100%;
  height: 100%;
  padding: 0;
  display: flex;
  justify-content: center;
  align-items: center;
}

.modal-body img {
  max-width: 100%;
  max-height: 100%;
  object-fit: contain;
}
</style>