<template>
    <!-- Categories -->
    <div class="row">
        <h5 style="margin-top: 5rem">ប្រភេទ​ទាំងអស់</h5>
        <div class="category-container">
            <div class="category-item p-4 rounded-3 m-3 shadow-sm" v-for="category in categories" :key="category.id">
                <router-link :to="{ name: 'AllProducts', params: { id: category.id } }"
                    class="category-link d-flex flex-column align-items-center">
                    <img :src="`http://127.0.0.1:8000/storage/${category.image}`"
                        class="rounded-circle p-2 category-image" style="width: 100px; height: 100px" />
                    <h6 class="category-name">{{ category.name }}</h6>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["categories"],
}
</script>

<style>
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
</style>