<template>
  <WebLayout>
    <div class="container mb-3" style="margin-top: 95px">
      <div class="row">
        <div class="col-md-4 text-center">
          <img
            :src="`http://127.0.0.1:8000/storage/profiles/${user.profile}`"
            class="rounded-circle mb-3" width="120px"
            alt="User Profile"
          />
          <h2>{{ user.name }}</h2>
          <p>{{ user.email }}</p>
          <button @click="editMode = true" class="btn btn-primary">Edit Profile</button>
        </div>
        <div class="col-md-8">
          <div class="card">
            <div class="card-body">
              <h3 class="card-title">About Me</h3>
              <p v-if="!editMode" class="card-text">
                {{ user.bio }}
              </p>
              <textarea v-else v-model="user.bio" class="form-control"></textarea>
            </div>
          </div>
          <div class="card mt-4">
            <div class="card-body">
              <h3 class="card-title">Contact Information</h3>
              <ul class="list-group list-group-flush">
                <li class="list-group-item">
                  <i class="fas fa-envelope mr-2"></i>
                  <span v-if="!editMode">{{ user.email }}</span>
                  <input v-else v-model="user.email" type="email" class="form-control">
                </li>
                <li class="list-group-item">
                  <i class="fas fa-phone-alt mr-2"></i>
                  <span v-if="!editMode">{{ user.phone }}</span>
                  <input v-else v-model="user.phone" type="tel" class="form-control">
                </li>
                <!-- <li v-if="user.address" class="list-group-item">
                  <i class="fas fa-map-marker-alt mr-2"></i>
                  <span v-if="!editMode">{{ user.address }}</span>
                  <input v-else v-model="user.address" type="text" class="form-control">
                </li> -->
              </ul>
              <button v-if="editMode" @click="saveChanges" class="btn btn-primary">Save Changes</button>
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
import axios from 'axios';
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import { useAuthStore } from '@/stores/auth-store'

export default {
  name: 'ProfilePage',
  components: {
    WebLayout
  },
  data() {
    return {
      // user: { ...useAuthStore().user }, // Ensure a copy of user data is used to track changes
      // editMode: false

      user: {...useAuthStore().user },
      editMode: false,
    }
  },
  methods: {
    saveChanges() {
      const updatedData = {
        bio: this.user.bio,
        phone: this.user.phone,
        email: this.user.email,
        // address: this.user.address,
      };
      axios.post('http://127.0.0.1:8000/api/update-profile', updatedData)
        .then(() => {
          this.editMode = false;
          // Show success alert
          alert('Changes saved successfully!');
        })
        .catch(error => {
          console.error(error);
          // Show error alert
          alert('Failed to save changes.');
        });
    }
  }
}
</script>

<style>
</style>