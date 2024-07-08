<template>
  <WebLayout>
    <div class="container">
      <div class="row">
        <div class="background-container p-5" style="height: 70vh">
          <div class="content-text">
            <h4>
              យើងនឹងផ្តល់ជូននូវបន្លែ និងផ្លែឈើសរីរាង្គស្រស់ៗពីចម្ការរបស់យើងដល់មាត់ទ្វាររបស់អ្នក។
            </h4>
            <p>រួសរាន់ឡើង | ទិញឥឡូវនេះ!</p>
          </div>
        </div>
      </div>

      <!-- Categories -->
      <div class="row">
        <h5 style="margin-top: 5rem">ប្រភេទ​ទាំងអស់</h5>
        <div class="category-container">
          <div
            class="category-item p-4 rounded-3 m-3 shadow-sm"
            v-for="category in categories"
            :key="category.id"
          >
            <a
              :href="`/category/${category.id}`"
              class="category-link d-flex flex-column align-items-center"
            >
              <img
                :src="`http://127.0.0.1:8000/categories_images/${category.image}`"
                class="rounded-circle p-2 category-image"
                style="width: 100px; height: 100px"
              />
              <h6 class="category-name">{{ category.name }}</h6>
            </a>
          </div>
        </div>
      </div>
      <list-card-product></list-card-product>
    </div>
  </WebLayout>
</template>

<script setup lang="ts">
import axiosInstance, { CategoryLists, ProductLists } from '@/plugins/axios'
import WebLayout from '../../../Components/Layouts/WebLayout.vue'
import ListCardProduct from '@/Components/shop/ListCardProduct.vue'
import { onMounted, ref, computed } from 'vue'

const categories = ref([])
const products = ref([])

onMounted(async () => {
  try {
    const categoryResponse = await CategoryLists.getCategories()
    console.log('Category data:', categoryResponse.data.data)
    categories.value = categoryResponse.data.data

    const productResponse = await ProductLists.getProducts() // Adjust this based on your API or data source
    console.log('Product data:', productResponse.data.data)
    products.value = productResponse.data.data
  } catch (error) {
    console.error('Error fetching data:', error)
  }
})
</script>

<style scoped>
.background-container {
  background-image: url('https://www.eatthis.com/wp-content/uploads/sites/4/2023/07/fruits-and-vegetables.jpg?quality=82&strip=1');
  background-position: center;
  background-size: cover;
  margin-top: 5%;
  display: flex;
  justify-content: center;
  align-items: center;
  color: rgb(10, 3, 3); /* Text color */
}
.content-text {
  text-align: center;
  background: rgba(
    237,
    244,
    239,
    0.5
  ); /* Optional: Add a semi-transparent background to the content */
  padding: 20px;
  border-radius: 10px;
}

.category-container {
  display: flex;
  overflow-x: auto;
  overflow-y: hidden;
  scrollbar-width: none;
  /* For Firefox */
  -ms-overflow-style: none;
  /* For Internet Explorer and Edge */
}

.category-container::-webkit-scrollbar {
  display: none;
  margin-top: 2rem;
}
.category-item {
  flex: 0 0 auto;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  background-color: rgb(252, 252, 252);
  height: 10 rem;
  margin-right: 1rem; /* Add some spacing between the category items */
}

.category-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  background: #adebb5;
}

.category-link {
  color: inherit;
  text-decoration: none;
}

.category-link:hover .category-name {
  color: #000;
}

.category-image {
  transition: transform 0.3s ease;
}

.category-link:hover .category-image {
  transform: scale(1.1);
}
</style>