<template>
  <WebLayout>
    <div class="container mt-30 mb-5">

      <div class="d-flex justify-content-between rounded-3 p-5 " style="box-shadow: 3px 2px 10px 3px #7A9E6B;">
        <div class="card-image col-4">
          <img
            v-if="store.post.image !== null"
            :src="`http://127.0.0.1:8000/storage/${store.post.image}`"
            alt="blog.image"
            style="width: 80%; margin-top: 0.5rem; border-radius: 0.5rem"
          />
        </div>
        <div class="card-info col-8 text-justify">
          <h4 class="fw-bold mt-2">
            {{ store.post.title }}
            <hr class="solid" style="border-top: 3px solid black">
          </h4>
          <p class="mt-4">
            {{ store.post.description }}
          </p>
          <p class="mt-3">
            ថ្ងៃទី <strong>​ {{ formattedDate(store.post.created_at) }}</strong> ម៉ោង <strong>{{
              formattedTime(store.created_at)
            }}</strong>
            
          </p>
          
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