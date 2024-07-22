<template>
  <div class="blog-section" style="margin-top: -13rem" v-if="store.isAuthenticated && !store.user.shop">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6">
          <h2 class="section-title">ចុះឈ្មោះលក់កសិផលរបស់អ្នក</h2>
        </div>
      </div>
      <div class="row m-3 rounded shadow">
        <div class="col d-flex text-center align-items-center justify-content-between">
          <div class="col-7">
            <div class="post-content-entry">
              <h6>ចាប់ផ្ដើមលក់កសិផលរបស់អ្នក នៅថ្ងៃនេះដើម្បីគុណភាពនៃការរស់នៅ នឹងស្វែងរកទីផ្សារកសិកម្មកាន់តែមានភាពងាយស្រួលនឹងសម្បូរបែប</h6>
              <br />
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
                data-bs-whatever="@getbootstrap">
                បំពេញព័ត៍មានរបស់អ្នក
              </button>
              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">បំពេញព័ត៍មានរបស់អ្នក</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <el-form @submit="createShop">
                        <el-form-item :error="phoneError">
                          <el-input type="text" id="phone" placeholder="លេខទូរសព្ទ" v-model="phone" />
                        </el-form-item>
                        <div class="form-group mt-2">
                          <select v-model="gender" class="form-control" id="gender" aria-placeholder="Select gender">
                            <option value="" disabled selected>Select an option</option>
                            <option value="Female">ស្រី</option>
                            <option value="Male">ប្រុស</option>
                          </select>
                        </div>
                        <div class="modal-footer border-none">
                          <el-button size="large" class="mt-3 w-full" type="primary"
                            native-type="submit">បង្កើត</el-button>
                        </div>
                      </el-form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end card of province -->
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
  values.latitude = latitude.value,
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

<style></style>