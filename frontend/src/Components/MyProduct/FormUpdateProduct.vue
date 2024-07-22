<template>
  <button type="button" class="btn btn-primary d-none" @click="showToastUpdate">Show live toast</button>
  <!-- Toast container -->
  <div class="toast-container position-fixed top-0 end-0 p-1">
    <div id="showToastUpdate" class="p-2 toast bg-primary text-white p-2" role="alert" aria-live="assertive"
      aria-atomic="true">
      <div class="toast-header">
        <strong class="me-auto">សារ</strong>
        <small class="text-muted">Now</small>
        <button type="button" class="btn-close" @click="hideToast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        កែសម្រួលផលិតផលដោយជោគជ័យ
      </div>
    </div>
  </div>

  <button type="button" class="btn btn-primary d-none" @click="showErrorCreate">Show live toast</button>
  <!-- Toast container -->
  <div class="toast-container position-fixed top-0 end-0 p-1">
    <div id="showToastUpdateError" class="toast bg-danger text-white p-2" role="alert" aria-live="assertive"
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
  <div class="dialog-background active" @click="closeModel"></div>
  <dialog ref="productDialog" class="product-dialog" open>
    <!-- Form Update Product -->
    <el-form @submit="updateProduct" class="product-form">
      <h4 class="form-title text-center mb-3">កែសម្រួលផលិតផល</h4>
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

        </div>

        <div class="col-md-6">
          <!-- Category -->
          <div class="mb-4">
            <label for="category" class="form-label">ប្រភេទផលិតផល</label>
            <select class="form-select" v-model="categorys_id" :error="categoryError">
              <option disabled>ជ្រើសរើស...</option>
              <option v-for="category in categories.categorys.data" :key="category.id" :value="category.id">
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
        <el-button type="button" class="btn btn-danger" @click="closeModel">cancle</el-button>
        <el-button type="primary" native-type="submit" class="btn btn-success ms-2">Send</el-button>
      </div>
    </el-form>
  </dialog>
</template>
<script setup lang="ts">
import { ref, nextTick, onMounted } from 'vue';
import { categoryStore } from '@/stores/category-store';
import { stockStore } from '@/stores/stock-type-store';
import axiosInstance from '@/plugins/axios';
import { useField, useForm } from 'vee-validate';
import { useAuthStore } from '@/stores/auth-store';
import * as yup from 'yup';
const props = defineProps(['product']);
const emits = defineEmits(['close']);
const { product } = props;
const user = useAuthStore();
const stocks = stockStore();
const categories = categoryStore();
const isDialogOpen = ref(false);
const imageUrl = ref('');
const productDialog = ref<HTMLDialogElement | null>(null);
const formSchema = yup.object({
  name: yup.string().required().label('Product name'),
  price: yup.number().required().label('Price'),
  description: yup.string().label('Description'),
  image: yup
    .mixed()
    .required('Image is required')
    .test('fileSize', 'The file is too large', (value) => {
      return !value || (value && value.size <= 2000000); // 2MB
    })
    .test('fileType', 'Only image files are allowed', (value) => {
      return !value || (value && ['image/jpeg', 'image/png', 'image/gif'].includes(value.type));
    }),
  categorys_id: yup.number().required().label('Category ID'),
});
const { handleSubmit, isSubmitting, resetForm } = useForm({
  initialValues: {
    name: product.name || '',
    price: product.price || '',
    description: product.description || '',
    image: product.image || '',
    categorys_id: product.categorys_id || '',
  },
  validationSchema: formSchema
});
const updateProduct = handleSubmit(async (values) => {
  try {
    const response = await axiosInstance.post(`/products/update/${product.id}`, values, {
      headers: {
        'Content-Type': 'multipart/form-data',
      },
    });
    if (response.data.success) {
      resetForm();
      showToastUpdate();
      setTimeout(() => {
        emits('close');
      }, 2000);
    };
  } catch (error) {
    if (error.response && error.response.data.message === 'Stock limit exceeded') {
      showToastUpdateError(error.response.data.data);
    } else {
      console.error('Error updating product:', error);
    }
  }
});
const showToastUpdate = () => {
  nextTick(() => {
    const toastSuccessful = document.getElementById('showToastUpdate');
    if (toastSuccessful) {
      const bsToast = new bootstrap.Toast(toastSuccessful);
      bsToast.show();
    }
  });
};
const showToastUpdateError = (message) => {
  nextTick(() => {
    const toastEl = document.getElementById('showToastUpdateError');
    const errorToastBody = document.querySelector('.error-toast-body');
    if (errorToastBody) {
      errorToastBody.textContent = `អ្នកមិនអាចបង្កើតកសិផលបានទេ ពីព្រោះចំនួន ${message.quantity} ${message.name} ច្រើនជាងចំនួនកំណត់ ${message.limit_quantity} ${message.name} ដើម្បីបង្កើតលក់កសិផលបានច្រើនដោយគ្មានដែនកំណត់ អ្នកគ្រាន់តែធ្វើការបង់លុយសម្រាប់រយះពេលណាមួយ`;
    }
    const bsToastError = new bootstrap.Toast(toastEl);
    if (toastEl) {
      bsToastError.show();
    }
  });
};
const hideToast = () => {
  const closeUpdate = document.getElementById('showToastUpdate');
  if (closeUpdate) {
    const bsToast = new bootstrap.Toast(closeUpdate);
    imageUrl.value = '';
    bsToast.hide();
  }
};
const handleFileUpload = (event: Event) => {
  const target = event.target as HTMLInputElement;
  if (target.files && target.files[0]) {
    image.value = target.files[0];
    loadImage(target.files[0]);
  }
  console.log(target.files)
};

const closeModel = () => {
  emits('close');
};

const loadImage = (file: File) => {
  const reader = new FileReader();
  reader.onload = (event) => {
    imageUrl.value = event.target?.result;
  };
  reader.readAsDataURL(file);
};
const { value: name, errorMessage: nameError } = useField('name');
const { value: price, errorMessage: priceError } = useField('price');
const { value: description, errorMessage: descriptionError } = useField('description');
const { value: image, errorMessage: imageError } = useField('image');
const { value: categorys_id, errorMessage: categoryError } = useField('categorys_id');
onMounted(async () => {
  try {
    await stocks.fetchStocks();
  } catch (error) {
    console.error('Error fetching stocks:', error);
  }
});
onMounted(async () => {
  try {
    await categories.fetchCategorys();
  } catch (error) {
    console.error('Error fetching categories:', error);
  }
});
</script>
<style scoped>
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

.dialog-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1030;
  /* Ensure background appears behind dialog */
  /* backdrop-filter: blur(10px); */
  display: none;
}

.dialog-background.active {
  display: block;
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
  background-color: #dc3545;
  color: #fff;
  border: none;
}

.btn-danger:hover {
  background-color: #c82333;
}

.btn-success {
  background-color: #28a745;
  color: #fff;
  border: none;
}

.btn-success:hover {
  background-color: #218838;
}
</style>
