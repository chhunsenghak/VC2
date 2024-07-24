<template>
  <WebLayout>
    <div class="container mb-3" style="margin-top: 95px">
      <div class="row p-3 mb-2 border border-success">
        <div class="col-md-4 mt-0 text-center border-end border-4 border-success">
          <img
            :src="`http://127.0.0.1:8000/storage/${user.user.profile}`"
            class="rounded-circle mb-3 mt-4"
            alt="Profile Image"
          />
          <h2 class="text-success">{{ user.user.name }}</h2>
          <p class="text-success"> {{ user.user.email }}</p>
          <button @click="editProfile" class="btn btn-success">កែសម្រួលពត៍មាន</button>
        </div>

        <div class="col-md-8 mt-4">
          <div class="card mb-4 bg-success">
            <div class="card-body">
              <h3 class="text-white">អំពី</h3>
              <p v-if="user.user.bio !== null" class="card-text text-white">
                {{ user.user.bio }}
              </p>
            </div>
          </div>
          <div class="card mb-4 bg-success">
            <div class="card-body">
              <h3 class="text-white">មធ្យេាបាយទំនាក់ទង</h3>
              <p class="text-white mt-3">អុីម៊ែល : {{ user.user.email }}</p>
              <p class="text-white">ទូរស័ព្ទ : {{ user.user.phone }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="card border  border-1 border-success">
      <div class="card-body text-center">
        <h3 class="card-title text-success">តាមដានព័ត៍មានពួកយើង</h3>
        <div class="d-flex justify-content-center mt-4 " >
          <a :href="user.user.facebook" class="social-icon">
            <img src="../Profile/SocialMediaPictures.vue/facebook.png" alt="Facebook" />
          </a>
          <a :href="user.user.telegram" class="social-icon">
            <img src="../Profile/SocialMediaPictures.vue/telegram.png" alt="Telegram" />
          </a>
        </div>
      </div>
    </div>

    <!-- Edit Profile Modal -->

    <div v-if="isEditing" class="modal" tabindex="-1" role="dialog" style="display: block">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">កែសម្រួលព័ត៍មាន</h5>
            <button type="button" class="close " @click="closeModal">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="profile">រូបភាព</label>
                <input type="file"  class="form-control" id="file" @change="handleProfileChange" />
                <img v-if="imageUrl" :src="imageUrl" alt="Profile Image" />
              </div>
              <div class="form-group">
                <label for="bio">អំពី</label>
                <textarea class="form-control" v-model="user.user.bio"></textarea>
              </div>
              <div class="form-group">
                <label for="phone">ទូរស័ព្ទ</label>
                <input type="tel" class="form-control" v-model="user.user.phone" />
              </div>
              <div class="form-group">
                <label for="facebook">ហ្វេសប៊ុក</label>
                <input type="text" class="form-control" v-model="user.user.facebook" />
              </div>
              <div class="form-group">
                <label for="telegram">តេឡេក្រាម</label>
                <input type="text" class="form-control" v-model="user.user.telegram" />
              </div>
              <div class="form-group">
                <label for="linkedin">លីងអុីន</label>
                <input type="text" class="form-control" v-model="user.user.linkedin" />
              </div>

            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" @click="closeModal">បដិសេធ</button>
            <button type="button" class="btn btn-success" @click="saveChanges">រក្សាទុក</button>
          </div>
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import { useAuthStore } from '@/stores/auth-store'
import axiosInstance from '@/plugins/axios'

export default {
  name: 'ProfilePage',
  components: {
    WebLayout
  },
  data() {
    return {
      user: useAuthStore(),
      isEditing: false,
      profile: null,
      imageUrl: ''
    }
  },
  methods: {
    editProfile() {
      this.isEditing = true
    },
    closeModal() {
      this.isEditing = false
    },
    handleProfileChange(event) {
      this.profile = event.target.files[0]
      this.imageUrl = URL.createObjectURL(this.profile)
    },
    async saveChanges() {
      const formData = new FormData()
      if (this.profile) {
        formData.append('profile', this.profile)
      }
      formData.append('bio', this.user.user.bio)
      formData.append('phone', this.user.user.phone)
      formData.append('facebook', this.user.user.facebook)
      formData.append('telegram', this.user.user.telegram)
      formData.append('linkedin', this.user.user.linkedin)

      try {
        const response = await axiosInstance.post('/update-profile', formData, {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        })

        this.user.user.profile = response.data.profile
        this.user.user.bio = response.data.bio
        this.user.user.phone = response.data.phone
        this.user.user.linkedin = response.data.linkedin
        this.isEditing = false
      } catch (error) {
        console.error(error)
      }
    }
  }
}
</script>

<style>
.card {
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  border: none;
  border-radius: 10px;
}

.card-body {
  padding: 20px;
}

.card-title {
  font-weight: bold;
  margin-bottom: 10px;
}

.list-group-item {
  padding: 10px;
  border: none;
  border-radius: 10px;
}

.btn-circle {
  width: 40px;
  height: 40px;
  padding: 10px;
  border-radius: 50%;
  font-size: 18px;
}
img {
  max-width: 200px;
  max-height: 200px;
  margin-top: 0px;
}
.card {
  border: 1px solid #ddd;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  margin: 20px;
  padding: 20px;
}

.card-title {
  font-size: 24px;
  margin-bottom: 20px;
}

.social-icon {
  margin: 0 15px;
}

.social-icon img {
  width: 50px;
  transition:
    transform 0.3s,
    box-shadow 0.3s;
}

.social-icon img:hover {
  transform: scale(1.1);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
</style>
