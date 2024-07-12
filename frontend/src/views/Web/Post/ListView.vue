<template>
  <WebLayout>
    <!-- Banner Section -->
    <div class="banner-container">
      <img
        src="https://img.freepik.com/free-photo/portrait-asian-middle-aged-man-wearing-straw-hat-loincloth-write-clipboard-with-young-woman-farmer_1150-54166.jpg?t=st=1720428371~exp=1720431971~hmac=b78c9f1fe69708376147b46ebda3b6e0849d2dd6b3120d29512c4ae3fb4fd48c&w=900"
        alt="banner-image"
        class="banner-image"
      />
      <div class="banner-overlay"></div>
      <div class="banner-content">
        <h2 class="banner-title">Discover Our Posts</h2>
        <p class="banner-subtitle">Explore the latest posts and insights</p>
      </div>
    </div>

    <!-- Card Section -->
    <div class="card-section">
      <!-- Pagination Controls -->
      <div class="pagination mb-5">
        <button class="btn" @click="previousPage" :disabled="currentPage === 1">ពីមុន</button>
        <span class="text-center mt-2">{{ currentPage }} / {{ totalPages }}</span>
        <button class="btn" @click="nextPage" :disabled="currentPage === totalPages">
          បន្ទាប់
        </button>
        <button class="btn" @click="showAllPosts">មើលបន្ថែម​</button>
      </div>

      <!-- Card Post -->
      <div class="card-grid">
        <!-- Loop through posts based on pagination -->
        <div class="card" v-for="(store, index) in paginatedPosts" :key="index">
          <a href="/post_detail">
            <img
              v-if="store.image != null"
              :src="`http://127.0.0.1:8000/storage/post_images/nothing.png`"
              alt="store.title"
              class="card-image"
            />
            <div class="card-content">
              <h3 class="card-title">
                {{ store.title }}
              </h3>
              <p class="card-date">ថ្ងៃ​ {{ formattedDate(store.created_at) }} ម៉ោង{{ formattedTime(store.created_at) }}</p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </WebLayout>
</template>


<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import { usePostStore } from '@/stores/post-list'
import moment from 'moment'
export default {
  name: 'PostList',
  components: { WebLayout },
  data() {
    return {
      store: usePostStore(),
      currentPage: 1,
      postsPerPage: 8 // Number of posts per page
    }
  },
  computed: {
    // Calculate total pages based on posts length
    totalPages() {
      return Math.ceil(this.store.posts.length / this.postsPerPage)
    },
    // Calculate which posts to display on current page
    paginatedPosts() {
      const startIndex = (this.currentPage - 1) * this.postsPerPage
      return this.store.posts.slice(startIndex, startIndex + this.postsPerPage)
    }
  },
  mounted() {
    this.fetchPosts()
  },
  methods: {
    formattedDate(date) {
      return moment(date).format('DD-MM-YYYY')
    },
    formattedTime(date) {
      return moment(date).format('HH:mm');
    },
    fetchPosts() {
      this.store.fetchPosts() // Assuming this method exists in your store
    },
    nextPage() {
      if (this.currentPage < this.totalPages) {
        this.currentPage++
      }
    },
    previousPage() {
      if (this.currentPage > 1) {
        this.currentPage--
      }
    },
    showAllPosts() {
      // Option to show all posts (if needed)
      this.currentPage = 1
      this.postsPerPage = this.store.posts.length // Show all posts at once
    }
  }
}
</script>

<style scoped>
.pagination {
  margin-left: 65rem;
}
button {
  border: 1px solid grey;
}
.banner-container {
  position: relative;
  width: 100%;
  height: 400px;
  overflow: hidden;
}

.banner-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.banner-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(
    to right,
    rgba(0, 0, 0, 0.6),
    rgba(0, 0, 0, 0.3)
  ); /* Enhanced gradient */
}

.banner-content {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
  color: white;
  padding: 20px;
}

.banner-title {
  font-size: 36px;
  font-weight: bold;
  margin-bottom: 10px;
}

.banner-subtitle {
  font-size: 18px;
  margin-top: 10px;
}
/* Add hover effect for banner */
.banner-container:hover .banner-overlay {
  background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5));
}

.card-section {
  padding: 40px 20px;
}

.card-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr); /* Display 4 cards per row */
  grid-gap: 20px;
}

.card {
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  overflow: hidden;
  transition: box-shadow 0.3s ease, transform 0.3s ease;
}
a {
  color: black;
  text-decoration: none;
}

.card:hover {
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  transform: scale(1.02); /* Scale up slightly on hover */
}

.card-image {
  width: 100%;
  height: 200px;
  object-fit: cover;
  border-radius: 8px 8px 0 0;
}

.card-content {
  padding: 20px;
}

.card-title {
  font-size: 18px;
  font-weight: bold;
  margin-bottom: 10px;
}

.card-date {
  font-size: 14px;
  color: #666;
}

.card-link {
  display: inline-block;
  background-color: #007bff;
  color: #fff;
  text-decoration: none;
  padding: 8px 16px;
  border-radius: 4px;
  font-size: 14px;
  transition: background-color 0.3s ease;
}
</style>