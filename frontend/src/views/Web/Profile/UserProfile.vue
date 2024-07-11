<template>
  <WebLayout>
    <div class="container mb-3" style="margin-top: 95px">
      <div class="row">
        <div class="col-md-4 text-center">
          <img
            :src="`http://127.0.0.1:8000/storage/profiles/${user.user.profile}`"
            class="rounded-circle mb-3"
            width="120px"
            alt="Profile Picture"
          />
          <h2>{{ user.user.name }}</h2>
          <p>{{ user.user.email }}</p>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">About Me</h3>
              <p v-if="user.user.bio !== null" class="card-text">
                {{ user.user.bio }}
              </p>
              <p v-else>add bio</p>
            </div>
          </div>
          <div class="card mt-4">
            <div class="card-body">
              <h3 class="card-title">Contact Information</h3>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <i class="fas fa-envelope mr-2"></i>
                  {{ user.user.email }}
                </li>
                <li class="list-group-item">
                  <i class="fas fa-phone-alt mr-2"></i>
                  {{ user.user.phone }}
                </li>
                <li v-if="user.user.address" class="list-group-item">
                  <i class="fas fa-map-marker-alt mr-2"></i>
                  {{ user.user.address }}
                </li>
              </ul>
            </div>
          </div>
          <div class="card mt-4">
            <div class="card-body">
              <h3 class="card-title">Social Media</h3>
              <div class="d-flex justify-content-center">
                <a href="#" class="btn btn-primary btn-circle mr-3">
                  <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="btn btn-info btn-circle mr-3">
                  <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="btn btn-danger btn-circle mr-3">
                  <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="btn btn-primary btn-circle">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </WebLayout>
</template>
  
  <script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import { useAuthStore } from '@/stores/auth-store'
export default {
  name: 'ProfilePage',
  components: {
    WebLayout
  },
  data() {
    return {
      user: useAuthStore()
    }
  }
}
</script>
  
  <style>
</style>