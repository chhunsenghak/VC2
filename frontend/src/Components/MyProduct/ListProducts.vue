<template>
  <div class="row col-8">
    <!-- Button to Open Dialog -->
    <form-create-product></form-create-product>

    <!-- Update Product Form as Overlay -->
    <form-update-product
      v-if="isDialogOpen"
      :product="selectedProduct"
      @close="closeDialog"
      @submit="submitProduct"
      class="overlay"
    ></form-update-product>

    <!-- Product List Heading -->
    <h5 class="fw-bold" v-if="!isDialogOpen">ផលិតផលរបស់ខ្ញុំ</h5>
    <!-- Product Cards -->
    <div class="d-flex flex-wrap gap-3" v-if="!isDialogOpen">
      <div
        class="card shadow-sm product-card"
        v-for="product in productsStore.products.data"
        :key="product.id"
        style="width: 16rem"
      >
        <img
          class="card-img-top w-50 ml-15"
          :src="`http://127.0.0.1:8000/products_images/${product.image}`"
          alt="Card image cap"
        />
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


