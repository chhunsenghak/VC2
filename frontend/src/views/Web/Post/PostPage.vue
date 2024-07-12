<template>
  <WebLayout>
    <div class="container mt-30 mb-5">
      <div class="d-flex bg-white justify-content-between shadow rounded p-5">
        <div class="card-title col-4">
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
            :src="`http://127.0.0.1:8000/storage/${store.post.image}`"
            alt="blog.image"
            style="width: 100%; margin-top: 0.5rem; border-radius: 0.5rem"
          />
        </div>
        <div class="col-7 text-justify">
          {{ store.post.description }}
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

<style>
</style>