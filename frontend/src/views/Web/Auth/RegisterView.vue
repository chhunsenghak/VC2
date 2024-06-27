<!-- src/components/Login.vue -->
<template>
  <div class="flex items-center justify-center min-h-screen bg-gray-100">
    <el-card class="w-full max-w-md shadow-lg">
      <h2 class="text-2xl font-bold mb-6 text-center">Regiter</h2>
      <el-form @submit="register">
        <el-form-item :error="nameError" class="mt-8">
          <el-input placeholder="name" v-model="name" size="large" type="text" />
        </el-form-item>

        <el-form-item :error="emailError" class="mt-8">
          <el-input placeholder="Email Address" v-model="email" size="large" />
        </el-form-item>

        <el-form-item :error="passwordError" class="mt-8">
          <el-input placeholder="Password" v-model="password" size="large" type="password" />
        </el-form-item>
        <div>
          <el-button
            size="large"
            class="mt-3 w-full"
            type="primary"
            native-type="submit"
            >Submit</el-button
          >
        </div>
      </el-form>
      <!-- <p class="text-center text-gray-500 mt-4">
        Already have an account? <router-link to="/login">Login</router-link>
      </p> -->
    </el-card>
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
  name: yup.string().required().label('name'),
  password: yup.string().required().label('Password'),
  email: yup.string().required().email().label('Email address')
})

const { handleSubmit, isSubmitting } = useForm({
  initialValues: {
    name: '',
    password: '',
    email: ''
  },
  validationSchema: formSchema
})

const register = handleSubmit(async (values) => {
  try {
    const { data } = await axiosInstance.post('/register', values)
    localStorage.setItem('phsar_user', JSON.stringify(data))
    router.push('/')
  } catch (error) {}
})

const { value: name, errorMessage: nameError } = useField('name')
const { value: password, errorMessage: passwordError } = useField('password')
const { value: email, errorMessage: emailError } = useField('email')
</script>
  
  <style scoped>
.min-h-screen {
  min-height: 100vh;
}
</style>

