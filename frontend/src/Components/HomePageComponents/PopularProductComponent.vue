<template>
  <div
    class="blog-section"
    style="margin-top: -13rem"
    v-if="store.isAuthenticated && !store.user.shop"
  >
    <div class="container mt-15">
      <div class="row mb-4">
        <div class="col-md-6">
          <h3 class="section-title fw-bold">ចុះឈ្មោះលក់កសិផលរបស់អ្នក</h3>
        </div>
      </div>
      <div class="container-card">
        <div class="row">
          <div class="col-lg-18">
            <div class="card custom-card">
              <div class="card-body p-3 d-flex justify-content-center align-items-center h-50">
                <div class="row align-items-center">
                  <div class="col-md-6">
                    <img
                      src="../../assets/bannerpic.png"
                      class="img-fluid rounded-start custom-img"
                      alt="Banner"
                      style="width: 100%; height: 250%; margin-bottom: -4rem"
                    />
                  </div>
                  <div class="col-md-6">
                    <h5
                      class="card-title mb-4 text-center text-light text-md-start"
                      style="margin-right: 2rem"
                    >
                      ចាប់ផ្ដើមលក់ផលិតផលកសិកម្មរបស់អ្នកនៅថ្ងៃនេះ ដើម្បីលើកស្ទួយជីវភាព
                      និងស្វែងរកទីផ្សារកសិកម្មដ៏ស្រួលនិងសម្បូរបែប
                    </h5>
                    <div class="d-flex justify-content-center">
                      <button
                        type="button"
                        class="btn btn-success btn-lg custom-button"
                        data-bs-toggle="modal"
                        data-bs-target="#exampleModal"
                        data-bs-whatever="@getbootstrap"
                      >
                        បំពេញព័ត៍មាន
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal Popup -->
      <div
        class="modal fade"
        id="exampleModal"
        tabindex="-1"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">បំពេញព័ត៍មានរបស់អ្នក</h1>
              <button
                type="button"
                class="btn-close"
                data-bs-dismiss="modal"
                aria-label="Close"
              ></button>
            </div>
            <div class="modal-body">
              <form @submit.prevent="createShop">
                <div class="mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="phone"
                    placeholder="លេខទូរសព្ទ"
                    v-model="phone"
                  />
                  <div v-if="phoneError" class="invalid-feedback d-block">{{ phoneError }}</div>
                </div>
                <div class="mb-3">
                  <select
                    v-model="gender"
                    class="form-select"
                    id="gender"
                    aria-label="Select gender"
                  >
                    <option value="" disabled selected>ជ្រើសរើសភេទ</option>
                    <option value="Female">ស្រី</option>
                    <option value="Male">ប្រុស</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-success custom-submit-button">
                  បង្កើត
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup lang="ts">
import { ref } from 'vue'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { useRouter } from 'vue-router'

const store = useAuthStore()
const router = useRouter()
const latitude = ref(0)
const longitude = ref(0)

navigator.geolocation.getCurrentPosition(async (position) => {
  latitude.value = position.coords.latitude
  longitude.value = position.coords.longitude
  console.log('Current latitude:', latitude.value)
  console.log('Current longitude:', longitude.value)
})

const formSchema = yup.object({
  phone: yup.number().required().label('phone'),
  gender: yup.string().required().label('gender')
})

const { handleSubmit, isSubmitting } = useForm({
  initialValues: {
    phone: '',
    latitude: 0,
    longitude: 0,
    gender: ''
  },
  validationSchema: formSchema
})

const createShop = handleSubmit(async (values) => {
  values.latitude = latitude.value
  values.longitude = longitude.value
  try {
    const { data } = await axiosInstance.post('/user/create/shop', values)
    window.location.href = '/myProducts'
  } catch (error) {
    alert('can not create')
  }
})

const { value: phone, errorMessage: phoneError } = useField('phone')
const { value: gender, errorMessage: genderError } = useField('gender')
</script>

<style scoped>
.custom-card {
  box-shadow: 0 4px 8px rgba(228, 228, 228, 0.1);
  transition: box-shadow 0.3s ease-in-out;
  background: linear-gradient(135deg, #bcde93 0%, #2d8a02 100%);
  margin-bottom: -6rem;
}

.custom-card:hover {
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.custom-img {
  max-height: 300px;
  object-fit: cover;
}

.custom-button {
  width: 200px;
  transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
  margin-right: 3rem;
}

.custom-button:hover {
  background-color: #036705;
  transform: translateY(-2px);
}

.modal-content {
  border-radius: 10px;
  box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.modal-header {
  background-color: #f8f9fa;
  border-bottom: 1px solid #dee2e6;
  border-top-left-radius: 10px;
  border-top-right-radius: 10px;
}

.modal-header h1 {
  font-size: 1.5rem;
  font-weight: 700;
}

.modal-body {
  padding: 2rem;
}

.form-control {
  padding: 0.75rem;
  border-radius: 5px;
  box-shadow: none;
  transition: box-shadow 0.3s ease-in-out;
}

.form-control:focus {
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

.custom-submit-button {
  padding: 0.75rem;
  background-color: rgb(16, 99, 3);
  border: none;
  border-radius: 5px;
  margin-left: 40%;
  width: 20%;
  transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.custom-submit-button:hover {
  background-color: #047b08;
  transform: translateY(-2px);
}

.custom-submit-button:active {
  background-color: #004494;
  transform: translateY(0);
}

@media (max-width: 768px) {
  .custom-card {
    border-radius: 10px;
  }
  .custom-img {
    border-radius: 10px;
  }
  .card-body {
    padding: 3rem;
  }
  .custom-button {
    padding: 8px 16px;
    font-size: 0.875rem;
  }
  .custom-submit-button {
    padding: 0.5rem;
  }
}
</style>
