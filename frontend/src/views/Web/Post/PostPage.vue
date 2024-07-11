<template>
  <WebLayout>
    <div class="container mb-5">
      <div class="card-blog-left p-4 bg-white shadow-sm rounded">
        <div class="card-title">
          <h4 class="fw-bold mt-4">
            {{ store.post.title }}
          </h4>
          <p class="mt-3">
            ថ្ងៃ​ {{ formattedDate(store.post.created_at) }} ម៉ោង{{
              formattedTime(store.created_at)
            }}
          </p>
          <img
            v-if="store.post.image !== null"
            :src="`http://127.0.0.1:8000/storage/post_images/${store.post.image}`"
            alt="blog.image"
            style="width: 100%; margin-top: 0.5rem; border-radius: 0.5rem"
          />
        </div>
        <div class="article-body mt-4 text-justify">
          {{ store.post.description }}
        </div>
      </div>
      <div class="blog-post-right">
        <p class="bg-success text-white px-3 w-fit py-1 rounded-lg">អត្ថបទថ្មីៗ</p>
        <div class="card mt-1 shadow-sm">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img
                src="https://img.freepik.com/free-photo/women-preparing-healthy-meals-high-angle_23-2149894883.jpg?t=st=1720422709~exp=1720426309~hmac=41127de0e7a605354b0d3bc4c11bee33edd9324a5f0c5f33d4056317f3b1859a&w=900"
                class="card-img"
                alt="Healthy Meals"
                style="border-radius: 0.5rem; height: 100%; object-fit: cover"
              />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <p class="card-date mb-2">July 08 2024</p>
                <p class="card-title fw-bold mt-4">
                  ផ្លែឈើ២ប្រភេទ ញុំារាល់ថ្ងៃ សង្រ្គោះស្រ្តីពីជំងឺមហារីក២នេះ
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-4 shadow-sm">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img
                src="https://img.freepik.com/free-photo/women-preparing-healthy-meals-high-angle_23-2149894883.jpg?t=st=1720422709~exp=1720426309~hmac=41127de0e7a605354b0d3bc4c11bee33edd9324a5f0c5f33d4056317f3b1859a&w=900"
                class="card-img"
                alt="Healthy Meals"
                style="border-radius: 0.5rem; height: 100%; object-fit: cover"
              />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <p class="card-date mb-2">July 08 2024</p>
                <p class="card-title fw-bold mt-4">
                  ផ្លែឈើ២ប្រភេទ ញុំារាល់ថ្ងៃ សង្រ្គោះស្រ្តីពីជំងឺមហារីក២នេះ
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-4 shadow-sm">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img
                src="https://img.freepik.com/free-photo/women-preparing-healthy-meals-high-angle_23-2149894883.jpg?t=st=1720422709~exp=1720426309~hmac=41127de0e7a605354b0d3bc4c11bee33edd9324a5f0c5f33d4056317f3b1859a&w=900"
                class="card-img"
                alt="Healthy Meals"
                style="border-radius: 0.5rem; height: 100%; object-fit: cover"
              />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <p class="card-date mb-2">July 08 2024</p>
                <p class="card-title fw-bold mt-4">
                  ផ្លែឈើ២ប្រភេទ ញុំារាល់ថ្ងៃ សង្រ្គោះស្រ្តីពីជំងឺមហារីក២នេះ
                </p>
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
import { postStore } from '@/stores/post-detial'
import moment from 'moment'

export default {
  name: 'PostPage',
  components: {
    WebLayout
  },
  data() {
    return {
      store: postStore()
    }
  },
  mounted() {
    this.fetchPost()
  },
  methods: {
    fetchPost() {
      this.store.fetchPost(this.$route.params.id)
    },
    formattedDate(date) {
      return moment(date).format('DD-MM-YYYY')
    },
    formattedTime(date) {
      return moment(date).format('HH:mm')
    }
  }
}
</script>

<style scoped>
.container {
  display: grid;
  grid-template-columns: 2fr 1.5fr;
  gap: 2rem;
  margin-top: 125px;
}
.card-blog-left,
.blog-post-right {
  display: flex;
  flex-direction: column;
}

.blog-post-right {
  margin-top: 0.7rem;
}

.card {
  border: none;
  border-radius: 0.5rem;
}

.card-img {
  border-radius: 0.5rem 0 0 0.5rem;
  height: 100%;
  object-fit: cover;
}

.card-body {
  padding: 1rem;
}

.card-date {
  font-size: 0.9rem;
  color: #6c757d;
  margin-left: 13rem;
  margin-top: -1rem;
}
</style>