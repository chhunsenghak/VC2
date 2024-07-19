<template>
  <div>
    <!-- Button to open the product creation dialog -->
    <button class="btn btn-success ml-300" @click="openDialog">បង្កើត</button>

    <!-- Background overlay for dialog -->
    <div class="dialog-background" v-if="isDialogOpen" @click="closeDialog"></div>

    <!-- Product creation dialog -->
    <dialog ref="productDialog" class="product-dialog">
      <!-- Form to create a new product -->
      <form @submit.prevent="handleSubmit(submitProduct)" class="product-form" enctype="multipart/form-data">
        <h4 class="form-title text-center mb-3">បង្កើតផលិតផល</h4>

        <div class="row">
          <div class="col-md-6">
            <!-- Name Of Product -->
            <div class="mb-3">
              <label for="name" class="form-label">ឈ្មោះផលិតផល</label>
              <input type="text" class="form-control" id="name" v-model="name" />
              <span class="text-danger">{{ nameError }}</span>
            </div>

            <!-- Price Of Product -->
            <div class="mb-3">
              <label for="price" class="form-label">តម្លៃ</label>
              <div class="input-group">
                <span class="input-group-text">រៀល</span>
                <input type="text" class="form-control" id="price" v-model="price" />
              </div>
              <span class="text-danger">{{ priceError }}</span>
            </div>

            <!-- Description Of Product -->
            <div class="mb-3">
              <label for="desc" class="form-label">ពិពណ៍នាផលិតផល</label>
              <textarea class="form-control" id="desc" v-model="description"></textarea>
              <span class="text-danger">{{ descriptionError }}</span>
            </div>

            <!-- Date Of Product -->
            <div class="mb-3">
              <label for="date" class="form-label">ផុតកំណត់</label>
              <input type="date" class="form-control" id="date" v-model="date" />
              <span class="text-danger">{{ dateError }}</span>
            </div>
          </div>

          <div class="col-md-6">
            <!-- Discount -->
            <div class="mb-3">
              <label for="discount" class="form-label">បញ្ចុះតម្លៃ</label>
              <input type="text" class="form-control" id="discount" v-model="discount" />
              <span class="text-danger">{{ discountError }}</span>
            </div>

            <!-- Quantity Of Products -->
            <div class="mb-3">
              <label for="quantity" class="form-label">ចំនួន</label>
              <div class="input-group">
                <input type="text" class="form-control" id="quantity" v-model="quantity" />
                <select class="form-select" aria-label="Select Unit" v-model="stock_type_id">
                  <option disabled selected>ជ្រើសរើស...</option>
                  <option v-for="stock in stocks.stocks" :key="stock.id" :value="stock.id">
                    {{ stock.name }}
                  </option>
                </select>
              </div>
              <span class="text-danger">{{ quantityError }}</span>
            </div>

            <!-- Category -->
            <div class="mb-3">
              <label for="category" class="form-label">ប្រភេទផលិតផល</label>
              <select class="form-select" v-model="category">
                <option disabled selected>ជ្រើសរើស...</option>
                <option
                  v-for="category in categorys.categorys.data"
                  :key="category.id"
                  :value="category.id"
                >
                  {{ category.name }}
                </option>
              </select>
              <span class="text-danger">{{ categoryError }}</span>
            </div>

            <!-- Image Of Product -->
            <div class="mb-3 mt-5">
              <label for="file" class="form-label">រូបភាពផលិតផល</label>
              <input
                type="file"
                class="form-control"
                id="file"
                accept="image/*"
                @change="handleFileUpload"
              />
              <span class="text-danger">{{ imageError }}</span>
            </div>
          </div>
        </div>

        <!-- Action Buttons -->
        <div class="action-btn text-center mt-4">
          <button type="button" class="btn btn-danger" @click="closeDialog">cancle</button>
          <button type="submit" class="btn btn-success ms-2" @click="submitProduct">Send</button>
        </div>
      </form>
    </dialog>

    <!-- Product Cards List -->
    <!-- <div class="product-cards mt-4">
      <div class="product-card" v-for="product in productsArr" :key="product.id">
        <img :src="product.image" alt="Product Image" class="product-image" />
        <div class="product-details">
          <h5>{{ product.name }}</h5>
          <p>{{ product.price }} រៀល</p>
          <p>{{ product.description }}</p>
        </div>
      </div>
    </div> -->
  </div>
</template>

<script>
import { ref } from 'vue'
import { categoryStore } from '@/stores/category-store'
import { stockStore } from '@/stores/stock-type-store'
import axiosInstance from '@/plugins/axios'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'

const formSchema = yup.object({
  name: yup.string().required().label('Product name'),
  price: yup.string().required().label('Price'),
  description: yup.string().label('Description'),
  date: yup.date().required().label('Date'),
  image: yup.mixed().required().label('Image'),
  category: yup.number().required().label('Category'),
  discount: yup.string().label('Discount'),
  quantity: yup.number().required().label('Quantity'),
  stock_type_id: yup.number().required().label('Stock Type')
})

export default {
  name: 'FormCreateProduct',
  data() {
    return {
      isDialogOpen: false,
      stocks: stockStore(),
      categorys: categoryStore(),
      productsArr: [] // Assuming this is where products will be stored
    }
  },
  setup() {
    const { handleSubmit, isSubmitting } = useForm({
      validationSchema: formSchema
    })

    const { value: name, errorMessage: nameError } = useField('name')
    const { value: price, errorMessage: priceError } = useField('price')
    const { value: description, errorMessage: descriptionError } = useField('description')
    const { value: date, errorMessage: dateError } = useField('date')
    const { value: image, errorMessage: imageError } = useField('image')
    const { value: category, errorMessage: categoryError } = useField('category')
    const { value: discount, errorMessage: discountError } = useField('discount')
    const { value: quantity, errorMessage: quantityError } = useField('quantity')
    const { value: stock_type_id, errorMessage: stockTypeIdError } = useField('stock_type_id')

    const submitProduct = async () => {
      try {
        const formData = new FormData()
        formData.append('name', name.value)
        formData.append('price', price.value)
        formData.append('description', description.value)
        formData.append('date', date.value)
        formData.append('image', image.value)
        formData.append('category', category.value)
        formData.append('discount', discount.value)
        formData.append('quantity', quantity.value)
        formData.append('stock_type_id', stock_type_id.value)

        const response = await axiosInstance.post('/products/create', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })

        // Assuming addProductToCard and closeDialog are defined elsewhere
        this.productsArr.push(response.data)
        this.closeDialog()
      } catch (error) {
        console.error('Error creating product:', error)
      }
    }

    const handleFileUpload = (event) => {
      const file = event.target.files[0]
      image.value = file
    }

    return {
      name,
      nameError,
      price,
      priceError,
      description,
      descriptionError,
      date,
      dateError,
      image,
      imageError,
      category,
      categoryError,
      discount,
      discountError,
      stock_type_id,
      quantity,
      quantityError,
      handleSubmit,
      isSubmitting,
      submitProduct,
      handleFileUpload
    }
  },

  async mounted() {
    await this.fetchDataStock()
    await this.fetchDataCategory()
  },
  methods: {
    async fetchDataStock() {
      try {
        await this.stocks.fetchStocks()
      } catch (error) {
        console.error('Error fetching stocks:', error)
      }
    },

    async fetchDataCategory() {
      try {
        await this.categorys.fetchCategorys()
      } catch (error) {
        console.error('Error fetching category:', error)
      }
    },
    openDialog() {
      this.isDialogOpen = true
      this.$refs.productDialog.showModal()
    },

    closeDialog() {
      this.isDialogOpen = false
      this.$refs.productDialog.close()
    },
    submitProduct() {
      if (this.$refs.productForm.isValid) {
        this.submitProduct()
      }
    }
  }
}
</script>

<style scoped>
.dialog-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1040;
  display: flex;
  align-items: center;
  justify-content: center;
}

.product-dialog {
  width: 90%;
  max-width: 700px;
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  z-index: 1050;
}

.form-title {
  margin-bottom: 20px;
  font-weight: bold;
  color: #333;
}

.form-label {
  font-weight: bold;
  color: #333;
}

.form-control {
  padding: 0.75rem;
  font-size: 1rem;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
}

.input-group-text {
  font-size: 1rem;
  color: #333;
}

.btn {
  padding: 0.5rem 1rem;
  font-size: 1rem;
  border-radius: 0.25rem;
}

.btn-danger {
  background-color: #d65965;
  color: #fff;
  border: none;
}

.btn-danger:hover {
  background-color: #9d0817;
}

.btn-success {
  background-color: #35a14f;
  color: #fff;
  border: none;
}

.btn-success:hover {
  background-color: #09571a;
}

.text-danger {
  color: red;
  font-size: 0.875rem;
}

.product-cards {
  display: flex;
  flex-wrap: wrap;
}

.product-card {
  width: 200px;
  border: 1px solid #ced4da;
  border-radius: 8px;
  padding: 15px;
  margin: 10px;
  text-align: center;
}

.product-image {
  width: 100%;
  height: auto;
}

.product-details {
  margin-top: 10px;
}
</style>
