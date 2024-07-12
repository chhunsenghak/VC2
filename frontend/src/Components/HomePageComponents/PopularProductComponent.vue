<template>
  <div
    class="blog-section"
    style="margin-top: -13rem"
    v-if="store.isAuthenticated && !store.user.shop"
  >
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-6">
          <h2 class="section-title">ចុះឈ្មោះលក់កសិផលរបស់អ្នក</h2>
        </div>
      </div>

      <div class="row m-3 rounded shadow">
        <div class="col d-flex text-center align-items-center justify-content-between">
          <!-- start card of province -->

          <div class="col-5">
            <img
              src="https://appinventiv.com/wp-content/uploads/2021/09/Build-An-Organic-E-commerce-Platform.png"
              alt="Image"
              class="img-fluid w-100 p-3"
            />
          </div>
          <div class="col-7">
            <div class="post-content-entry mb-4">
              <h2>ចាប់ផ្តើមលក់ផលិតផលរបស់អ្នកឥឡូវនេះ យើងនឹងគាំទ្រអ្នក។</h2>
              <br />
              <button
                type="button"
                class="btn btn-primary"
                data-bs-toggle="modal"
                data-bs-target="#exampleModal"
                data-bs-whatever="@getbootstrap"
              >
                បំពេញព័ត៍មានរបស់អ្នក
              </button>
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
                      <form @submit="createShop">
                        <div class="">
                          <input
                            type="text"
                            class="form-control"
                            id="phone"
                            placeholder="លេខទូរសព្ទ"
                            v-model="phone"
                          />
                        </div>
                        <small class="text-left" style="color: red" v-if="phoneError"
                          >សូមបំពេញអោយបានត្រឹមត្រូវ</small
                        >
                        <div class="form-group mt-2">
                          <input
                            type="text"
                            class="form-control"
                            id="address"
                            placeholder="អាស័យដ្ឋាន"
                            v-model="address"
                          />
                          <small v-if="addressError">{{ addressError }}</small>
                        </div>
                        <div class="form-group mt-2">
                          <select
                            v-model="gender"
                            class="form-control"
                            id="gender"
                            aria-placeholder="Select gender"
                          >
                            <option value="" disabled selected>Select an option</option>
                            <option value="Female">ស្រី</option>
                            <option value="Male">ប្រុស</option>
                          </select>
                          <small class="text-start" style="color: red" v-if="genderError"
                            >ទាមទារបំពេញ</small
                          >
                        </div>
                        <div class="modal-footer border-none">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            បិទ
                          </button>
                          <button type="submit" class="btn btn-primary">បង្កើត</button>
                        </div>
                      </form>
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
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { useRouter } from 'vue-router'

const store = useAuthStore()
const router = useRouter()

const formSchema = yup.object({
  phone: yup.number().required().label('phone'),
  address: yup.string().label('address'),
  gender: yup.string().required().label('gender')
})

const { handleSubmit, isSubmitting } = useForm({
  initialValues: {
    phone: '',
    address: '',
    gender: ''
  },
  validationSchema: formSchema
})

const createShop = handleSubmit(async (values) => {
  try {
    const { data } = await axiosInstance.put('/user/create/shop', values)
    window.location.href = '/myProducts'
  } catch (error) {
    alert('can not create')
  }
})

const { value: phone, errorMessage: phoneError } = useField('phone')
const { value: address, errorMessage: addressError } = useField('address')
const { value: gender, errorMessage: genderError } = useField('gender')
</script>

<style></style>