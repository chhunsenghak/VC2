<template>
  <div v-if="productsStore.products.data != ''" class="row ">
    <form-create-product>


    </form-create-product>
    <!-- Button to Open Dialog -->


    <!-- Update Product Form as Overlay -->
    <form-update-product v-if="isDialogOpen" :product="selectedProduct" @close="closeDialog" @submit="submitProduct"
      class="overlay"></form-update-product>

    <!-- Product List Heading -->
    <h5 class="fw-bold" >ផលិតផលរបស់ខ្ញុំ</h5>
    <div class="w-38" style="border-bottom: 2px solid green; margin-left: 13px; "></div>

    <!-- Product table -->
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
        <tbody v-for="product in productsStore.products.data" :key="product.id">
          <tr>
            <th scope="row">{{ product.id }}</th>
            <td>{{ product.name }}</td>
            <td>{{ product.price }}</td>
            <td>{{ product.category.name }}</td>
            <td>{{ product.created_at}}</td>
            <td>
              <img class="card-img-top w-10 h-10 " :src="`http://127.0.0.1:8000/products_images/${product.image}`"
                alt="image product" style="border-radius: 50%;" />
            </td>
            <td>{{ product.description }}</td>
            <td>
              <i class="material-icons text-danger me-3">delete</i>
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
    },
    // formattedDate(date) {
    //   return moment(date).format('YYYY-MM-DD HH:mm:ss')
    // }
  }
}
</script>



