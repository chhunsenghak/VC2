<template>
  <div class="d-flex justify-content-between align-items-center col-12​">
    <div>
      <h5 class="fw-bold">ផលិតផលរបស់ខ្ញុំ</h5>
      <div class="w-38" style="border-bottom: 2px solid green;"></div>
    </div>
    <button class="btn btn-success float-end" @click="openDialog">បង្កើត</button>
  </div>
  <div class="container">
    <button type="button" class="btn btn-primary d-none" @click="showToastCreate">Show live toast</button>
    <!-- Toast container -->
    <div class="toast-container position-fixed top-0 end-0 p-1">
      <div id="showToast" class="p-2 toast bg-primary text-white p-2" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">សារ</strong>
          <small class="text-muted">Now</small>
          <button type="button" class="btn-close" @click="hideToast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          បង្កើតដោយជោគជ័យ
        </div>
      </div>
    </div>

    <button type="button" class="btn btn-primary d-none" @click="showErrorCreate">Show live toast</button>
    <!-- Toast container -->
    <div class="toast-container position-fixed top-0 end-0 p-1">
      <div id="showToastError" class="toast bg-danger text-white p-2" role="alert" aria-live="assertive"
        aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Notification</strong>
          <small class="text-muted">Now</small>
          <button type="button" class="btn-close" @click="hideToast" aria-label="Close"></button>
        </div>
        <div class="error-toast-body">

        </div>
      </div>
    </div>
    <!-- Button to open the product creation dialog -->


    <!-- Background overlay for dialog -->
    <div class="dialog-background" v-if="isDialogOpen" @click="closeDialog"></div>

    <!-- Product creation dialog -->
    <dialog ref="productDialog" class="product-dialog">
      <!-- Form to create a new product -->
      <el-form @submit="submitProduct">
        <h4 class="form-title text-center mb-4">បង្កើតផលិតផល</h4>

        <div class="row">
          <div class="col-md-6">
            <!-- Name Of Product -->
            <div class="mb-4">
              <label for="name" class="form-label">ឈ្មោះផលិតផល</label>
              <el-form-item :error="nameError">
                <el-input placeholder="ឈ្មោះ" v-model="name" size="large" type="text" />
              </el-form-item>
            </div>

            <!-- Price Of Product -->
            <div class="mb-4">
              <label for="price" class="form-label">តម្លៃ</label>
              <el-form-item class="row" :error="priceError">
                <el-input type="number" size="large" v-model="price" />
                <small class="text-danger">តម្លៃរៀល*</small>
              </el-form-item>
            </div>

            <!-- Description Of Product -->
            <div class="mb-4">
              <label for="desc" class="form-label">ពិពណ៍នាផលិតផល</label>
              <textarea class="form-control" id="desc" v-model="description"></textarea>
              <span class="text-danger">{{ descriptionError }}</span>
            </div>

            <!-- Date Of Product -->
            <div class="mb-4">
              <label for="date" class="form-label">ផុតកំណត់</label>
              <el-form-item :error="dateError">
                <el-input type="date" id="date" size="large" v-model="break_product_at" />
              </el-form-item>
            </div>
          </div>

          <div class="col-md-6">
            <!-- Quantity Of Products -->
            <div class="mb-4">
              <label for="quantity" class="form-label">ចំនួន នឹង ប្រភេទស្ដុប</label>
              <div class="input-group">
                <input type="number" class="form-control" v-model="quantity" />
                <select class="form-select​" aria-label="Select Unit" v-model="stock_type_id">
                  <option disabled selected>ជ្រើសរើស...</option>
                  <option v-for="stock in stocks.stocks" :key="stock.id" :value="stock.id">
                    {{ stock.name }}
                  </option>
                </select>
              </div>
              <span class="text-danger">{{ quantityError }}</span>
            </div>

            <!-- Category -->
            <div class="mb-4">
              <label for="category" class="form-label">ប្រភេទផលិតផល</label>
              <select class="form-select" v-model="categorys_id" :error="categoryError">
                <option disabled selected>ជ្រើសរើស...</option>
                <option v-for="category in categorys.categorys.data" :key="category.id" :value="category.id">
                  {{ category.name }}
                </option>
              </select>
            </div>

            <!-- Image Of Product -->
            <div class="mb-4 mt-5">
              <label for="file" class="form-label">រូបភាពផលិតផល</label>
              <input type="file" class="form-control" id="file" required accept="image/*" @change="handleFileUpload" />
              <img v-if="imageUrl" class="w-100" :src="imageUrl" alt="Uploaded Image" />
              <span class="text-danger">{{ imageError }}</span>
            </div>
          </div>
        </div>
        <!-- Action Buttons -->
        <div class="action-btn text-center mt-4">
          <el-button type="button" class="btn btn-danger" @click="closeDialog">cancle</el-button>
          <el-button type="primary" native-type="submit" class="btn btn-success ms-2">Send</el-button>
        </div>
      </el-form>
    </dialog>
  </div>
</template>

<script setup lang="ts">
import { nextTick, onMounted, ref } from 'vue'
import { categoryStore } from '@/stores/category-store'
import { stockStore } from '@/stores/stock-type-store'
import axiosInstance from '@/plugins/axios'
import { useField, useForm } from 'vee-validate'
import { useAuthStore } from '@/stores/auth-store'
import * as yup from 'yup'

const user = useAuthStore();
const stocks = stockStore();
const categorys = categoryStore();
const isDialogOpen = ref(false);
const imageUrl = ref('');
const productDialog = ref<HTMLDialogElement | null>(null);

const formSchema = yup.object({
  name: yup.string().required().label('Product name'),
  price: yup.number().required().label('Price'),
  description: yup.string().label('Description'),
  break_product_at: yup.date().required().label('Date'),
  image: yup
    .mixed()
    .required('Image is required')
    .test('fileSize', 'The file is too large', (value) => {
      return !value || (value && value.size <= 2000000); // 2MB
    })
    .test('fileType', 'Only image files are allowed', (value) => {
      return !value || (value && ['image/jpeg', 'image/png', 'image/gif'].includes(value.type));
    }),
  categorys_id: yup.number().required().label('categorys_id'),
  quantity: yup.number().required().label('Quantity'),
  stock_type_id: yup.number().required().label('Stock Type')
})

const { handleSubmit, isSubmitting, resetForm } = useForm({
  initialValues: {
    name: '',
    price: '',
    description: '',
    break_product_at: '',
    image: '',
    categorys_id: '',
    quantity: '',
    stock_type_id: '',
    frontuser_id: user.user.id,
  },
  validationSchema: formSchema
})

const submitProduct = handleSubmit(async (values) => {
  try {
    const formData = new FormData();
    for (let key in values) {
      formData.append(key, values[key]);
    }
    const response = await axiosInstance.post('/products/create', formData, {
      headers: {
        'Content-Type': 'multipart/form-data'
      }
    })
    closeDialog();
    resetForm();
    showToastCreate();
  } catch (error) {
    if (error.response.data.message == "Stock limit exceeded") {
      closeDialog();
      showErrorCreate(error.response.data.data);
    };
  }
})

const showToastCreate = () => {
  nextTick(() => {
    const toastEl = document.getElementById('showToast');
    if (toastEl) {
      const bsToast = new bootstrap.Toast(toastEl);
      bsToast.show();
    }
  });
}

const showErrorCreate = (message) => {
  console.log(message);
  nextTick(() => {
    const toastE2 = document.getElementById('showToastError');
    const error_toast_body = document.querySelector('.error-toast-body');
    error_toast_body.textContent = "អ្នកមិនអាចបង្កើតកសិផលបានទេ ពីព្រោះចំនួន "
      + message.quantity + "​ " + message.name + " ច្រើនជាងចំនួនកំណត់ " +
      message.limit_quantity + " " + message.name + " ដើម្បីបង្កើតលក់កសិផលបានច្រើនដោយគ្មានដែនកំណត់ អ្នកគ្រាន់តែធ្វើការបង់លុយសម្រាប់រយះពេលណាមួយ​ អ្នកនឹងអាចលក់កសិផលបានគ្រប់មុខដោយគ្មានដែនកំណត់";
    if (toastE2) {
      const bsToastError = new bootstrap.Toast(toastE2);
      bsToastError.show();
    }
  });
}

const hideToast = () => {
  const toastEl = document.getElementById('showToast');
  if (toastEl) {
    const bsToast = new bootstrap.Toast(toastEl);
    imageUrl.value = ""
    bsToast.hide();
  }
}

const { value: name, errorMessage: nameError } = useField('name');
const { value: price, errorMessage: priceError } = useField('price');
const { value: description, errorMessage: descriptionError } = useField('description');
const { value: break_product_at, errorMessage: dateError } = useField('break_product_at');
const { value: image, errorMessage: imageError } = useField('image');
const { value: categorys_id, errorMessage: categoryError } = useField('categorys_id');
const { value: quantity, errorMessage: quantityError } = useField('quantity');
const { value: stock_type_id, errorMessage: stockTypeError } = useField('stock_type_id');


const handleFileUpload = (event: Event) => {
  const target = event.target as HTMLInputElement;
  if (target.files && target.files[0]) {
    image.value = target.files[0];
    loadImage(target.files[0]);
  }
  console.log(target.files)
};

const loadImage = (file: File) => {
  const reader = new FileReader();
  reader.onload = (event) => {
    imageUrl.value = event.target?.result;
  };
  reader.readAsDataURL(file);
};

const openDialog = () => {
  isDialogOpen.value = true;
  productDialog.value?.showModal();
};

const closeDialog = () => {
  isDialogOpen.value = false;
  productDialog.value?.close();
};

onMounted(async () => {
  try {
    await stocks.fetchStocks()
  } catch (error) {
    console.error('Error fetching stocks:', error)
  }
});

onMounted(async () => {
  try {
    await categorys.fetchCategorys()
  } catch (error) {
    console.error('Error fetching category:', error)
  }
});
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
