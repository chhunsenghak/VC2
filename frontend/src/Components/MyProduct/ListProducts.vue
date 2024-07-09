<template>
  <!-- Product List -->
  <div class="row col-8">
    <h5>ផលិតផលរបស់ខ្ញុំ</h5>
    <div class="d-flex flex-wrap gap-3">
      <div
        class="card shadow-sm"
        v-for="product in productsStore.products.data"
        :key="product.id"
        style="width: 16rem"
      >
        <img
          class="card-img-top"
          :src="`http://127.0.0.1:8000/storage/products/${product.image}`"
          alt="Card image cap"
        />
        <div class="card-body">
          <h5 class="card-title">{{ product.name }}</h5>
          <p class="card-text">{{ product.description }}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{ product.price }}</li>
          <li class="list-group-item">{{ product.discount }}</li>
          <li class="list-group-item">{{ product.category.name }}</li>
        </ul>
        <div class="card-body">
          <a href="#" class="btn btn-secondary">Card link</a>
          <a href="#" class="btn btn-danger">Another link</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['productsStore']
}
</script>

<style>
</style>