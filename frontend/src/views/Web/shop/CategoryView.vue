<template>
  <WebLayout>
    <div class="container" style="margin-top: 4.8rem;">
      <div class="row">
        <div class="background-url p-5 " style="
            /* background-color: #a9eaa8; */
            height: 70vh;
            justify-content: space-between;
            display: flex;

          ">
          <div class="info-text  ml-10">
            <h1>GROCERY STORE</h1>
            <p>Fresh Fruits, Meats & Vegetables</p>
            <br />
            <button class="btn btn-danger">Shop Now</button>
          </div>
          <!-- <img src="/src/assets/images/image 74.png" alt="" class="mr-9" style="height: 50vh" /> -->
        </div>
      </div>

      <!-- Categories -->
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
      <list-card-product class="mt-5"></list-card-product>
    </div>
  </WebLayout>
</template>

<script setup lang="ts">
import axiosInstance, { CategoryLists, ProductLists } from '@/plugins/axios'
import WebLayout from '../../../Components/Layouts/WebLayout.vue'
import ListCardProduct from '../../../Components/shop/ListCardProduct.vue'
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

.background-url{
  background-image:url("https://img.freepik.com/premium-photo/fresh-green-vegetables-wicker-mat-isolated-white_392895-252155.jpg?size=626&ext=jpg&uid=R91417083&ga=GA1.1.1784537274.1720200240&semt=ais_user") ;
  background-position: center;
  background-size: cover;
  margin-top: 5%;


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
  display: none; /* For Chrome, Safari, and Opera */
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