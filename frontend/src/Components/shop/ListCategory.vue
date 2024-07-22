<template>
  <!-- Categories -->
  <div class="category-container d-flex flex-column">
    <h5 class="fw-bold">ប្រភេទផលិតផល</h5>
    <div class="category-scroll-container d-flex flex-nowrap overflow-auto">
      <router-link v-for="category in categories" :key="category.id"
        :to="{ name: 'AllProducts', params: { id: category.id } }"
        class="category-item rounded-3 m-3 shadow-sm transition-hover text-decoration-none">
        <div class="card border-0 category-card">
          <div class="card-body d-flex flex-column align-items-center">
            <div
              class="category-image-container rounded-circle overflow-hidden bg-gray-200 d-flex justify-content-center align-items-center">
              <img :src="`http://127.0.0.1:8000/storage/${category.image}`"
                class="category-image w-100 h-100 object-fit-cover" />
            </div>
            <h6 class="card-title mt-3 category-name">{{ category.name }}</h6>
          </div>
        </div>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  props: ['categories']
}
</script>

<style scoped>
.category-item {
  transition: all 0.3s ease;
  display: flex;
  flex: 0 0 auto;
}

.category-item:hover {
  background-color: #92eaa8;
  /* Light green background */
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  /* Slightly larger shadow */
}

.category-link {
  color: green;
  transition: color 0.3s ease;
}

.category-link:hover {
  color: #010302;
  /* Darker green */
}

.category-container {
  display: flex;
  margin-top: 2rem;
  padding-left: 50px;
  padding-right: 50px;
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

.category-scroll-container {
  scrollbar-width: none;
  /* Firefox */
  -ms-overflow-style: none;
  /* Internet Explorer 10+ */
}

.category-scroll-container::-webkit-scrollbar {
  width: 0;
  height: 0;
}

.category-card {
  transition: transform 0.3s, box-shadow 0.3s;
}

.category-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 24px 0 rgba(0, 0, 0, 0.1);
}

.category-image-container {
  width: 100px;
  height: 100px;
}

.category-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.card-title {
  color: black;
}
</style>