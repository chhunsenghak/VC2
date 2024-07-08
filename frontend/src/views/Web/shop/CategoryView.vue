<template>
  <WebLayout>
    <div class="container">
      <div class="row">
        <div class="background-container p-5 " style="
       
            height: 70vh;
         

          ">
            <div class="content-text">
              <h4>យើងនឹងផ្តល់ជូននូវបន្លែ និងផ្លែឈើសរីរាង្គស្រស់ៗពីចម្ការរបស់យើងដល់មាត់ទ្វាររបស់អ្នក។ </h4>
              <p>រួសរាន់ឡើង | ទិញឥឡូវនេះ!</p>
            </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 p-5">
          <h5 class="mt-5">All Categories</h5>
        </div>
      </div>
      <div class="row" style="height: 30vh; margin-top: -40px">
        <div class="category-container d-flex flex-">
          <div class="category-item p-4 rounded-3 m-3 shadow-sm" v-for="category in categories" :key="category.id">
            <a :href="`/category/${category.id}`" class="category-link d-flex flex-column align-items-center">
              <img :src="`http://127.0.0.1:8000/categories_images/${category.image}`"
                class="rounded-circle p-2 category-image" style="width: 100px; height: 100px" />
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
import axiosInstance, { CategoryLists } from '@/plugins/axios'
import WebLayout from '../../../Components/Layouts/WebLayout.vue'
import ListCardProduct from '../../../Components/shop/ListCardProduct.vue'
import { onMounted, ref } from 'vue'

const categories = ref([])

onMounted(async () => {
  try {
    const response = await CategoryLists.getCategories()
    console.log('Response data:', response.data.data)
    categories.value = response.data.data
  } catch (error) {
    console.error('Error fetching categories:', error)
  }
})
</script>

<style scoped>
.background-container {
  background-image: url("https://www.eatthis.com/wp-content/uploads/sites/4/2023/07/fruits-and-vegetables.jpg?quality=82&strip=1");
  background-position: center;
  background-size: cover;
  margin-top: 5%;
  display:flex;
  justify-content: center;
  align-items: center;
  color: rgb(10, 3, 3); /* Text color */
  
  
}
.content-text{
  text-align: center;
  background: rgba(237, 244, 239, 0.5); /* Optional: Add a semi-transparent background to the content */
  padding: 20px;
  border-radius: 10px;
  /* border: 1px solid green; */
  /* box-shadow: 1px 1px 8px 1px green; */
  
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
  /* For Chrome, Safari, and Opera */
}

.category-item {
  flex: 0 0 auto;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  background-color: rgb(252, 252, 252);
  height: 10 rem;
  margin-right: 1rem;
  /* Add some spacing between the category items */
}

.category-item:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  background: #fce5e2;
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