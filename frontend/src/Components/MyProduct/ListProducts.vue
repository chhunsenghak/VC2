<template>
  <div v-if="productsStore.products.data != ''" class="row col-8">
    <form-create-product>
    </form-create-product>
    <!-- Button to Open Dialog -->
    <!-- Update Product Form as Overlay -->
    <form-update-product v-if="isDialogOpen" :product="selectedProduct" @close="closeDialog" @submit="submitProduct"
      class="overlay"></form-update-product>

    <!-- Product List Heading -->
    <h5 class="fw-bold" v-if="!isDialogOpen">ផលិតផលរបស់ខ្ញុំ</h5>
    <!-- Product Cards -->
    <div class="d-flex flex-wrap gap-3" v-if="!isDialogOpen">
      <div class="card shadow-sm product-card" v-for="product in productsStore.products.data" :key="product.id"
        style="width: 16rem">
        <img class="card-img-top w-50 ml-15" :src="`http://127.0.0.1:8000/storage/${product.image}`" alt="Card image cap" />
        <div class="card-body">
          <h5 class="card-title">{{ product.name }}</h5>
          <p class="card-text">{{ product.description }}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">តម្លៃ: {{ product.price }}</li>
          <li class="list-group-item">បញ្ចុះ: {{ product.discount }}</li>
          <li class="list-group-item">ប្រភេទ: {{ product.category.name }}</li>
          <li class="list-group-item">
            <i class="material-icons text-danger me-3">delete</i>
            <i class="material-icons text-success" @click="openDialog(product)">edit</i>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div v-else class="row col-8">
    <!-- create card to confirm that we do not have product yet -->
    <form-create-product></form-create-product>

    <div class="d-flex">
      <div class="card">
        <div class="card-header">
          Product Information
        </div>
        <div class="card-body">
          <img src="../../image/empty-cart.png" width="250px" class="ml-13">

          <h5 class="card-title">No Product Available</h5>
          <p class="card-text">We currently do not have any product information available.</p>
        </div>
      </div>
    </div>

  </div>


</template>

<script>
import FormCreateProduct from '/src/Components/MyProduct/FormCreateProduct.vue'
import FormUpdateProduct from '/src/Components/MyProduct/FormUpdateProduct.vue'

export default {
  props: ['productsStore'],
  components: {
    FormCreateProduct,
    FormUpdateProduct
  },
  name: 'NoProductCard',
  data() {
    return {
      isDialogOpen: false,
      selectedProduct: null
    }
  },
  methods: {
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
    }
  }
}
</script>


<style scoped>
.row col-8 {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
  background-color: #f8f9fa;
}

.card {
  width: 100%;
  max-width: 400px;
  border: 1px solid #dee2e6;
  border-radius: 0.25rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);

}

.card-header {
  background-color: #088a54;
  color: #fff;
  padding: 0.75rem 1.25rem;
  border-bottom: 1px solid #dee2e6;
}

.card-body {
  padding: 1.25rem;
}
</style>
