<!-- src/components/Login.vue -->
<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <el-card class="w-full max-w-md shadow-lg">
      <h2 class="text-2xl font-bold mb-6 text-center">ចូរគណនី</h2>
      <el-form @submit="onSubmit">
        <el-form-item :error="emailError" class="mt-8">
          <el-input placeholder="អ៊ីមែល" v-model="email" size="large" />
        </el-form-item>

        <el-form-item :error="passwordError" class="mt-8">
          <el-input placeholder="លេខសម្ងាត់" v-model="password" size="large" type="password" />
        </el-form-item>
        <div>
          <el-button
            size="large"
            class="mt-3 w-full"
            :disabled="isSubmitting"
            type="success"
            native-type="submit"
            >ដាក់ស្នើ</el-button
          >
        </div>
      </el-form>
      <p class="text-center text-gray-500 mt-4">
        នៅមិនទាន់មានគណនីទេ? <a href="/register">ចុះឈ្មោះ</a>
      </p>
      <div class="mt-8 text-center text-red-500">
       ភ្លេចលេខសម្ងាត់? <a href="/forgot_password">កំណត់ពាក្យសម្ងាត់ឡើងវិញ</a>
      </div>
    </el-card>
  </div>
</template>
  
  <script setup lang="ts">
import axiosInstance from '@/plugins/axios'
import { useField, useForm } from 'vee-validate'
import * as yup from 'yup'
import { useRouter } from 'vue-router'
import { useAuthStore } from '@/stores/auth-store'
const router = useRouter()
const store = useAuthStore()
if (store.isAuthenticated) {
  router.push('/')
}

const formSchema = yup.object({
  password: yup.string().required().label('Password'),
  email: yup.string().required().email().label('Email address')
})

const { handleSubmit, isSubmitting } = useForm({
  initialValues: {
    password: '',
    email: ''
  },
  validationSchema: formSchema
})
const onSubmit = handleSubmit(async (values) => {
  try {
    const { data } = await axiosInstance.post('/login', values)
    localStorage.setItem('access_token', data.access_token)
    router.push('/')
  } catch (error) {
    alert = true
  }
})

const { value: password, errorMessage: passwordError } = useField('password')
const { value: email, errorMessage: emailError } = useField('email')
</script>
  
  <style scoped>
.min-h-screen {
  min-height: 100vh;
}
</style>
  