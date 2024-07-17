<template>
  <div class="dialog-background active" @click="closeDialog"></div>
  <dialog ref="productDialog" class="product-dialog" open>
    <!-- Form Update Product -->
    <form @submit.prevent="submitProduct" class="product-form">
      <h4 class="form-title text-center mb-3">កែសម្រួលផលិតផល</h4>
      <div class="row">
        <div class="col-md-6">
          <!-- Name Of Product -->
          <div class="mb-3">
            <label for="name" class="form-label">ឈ្មោះផលិតផល</label>
            <input type="text" class="form-control" id="name" v-model="product.name" />
          </div>
          <!-- Price Of Product -->
          <div class="mb-3">
            <label for="price" class="form-label">តម្លៃ</label>
            <div class="input-group">
              <span class="input-group-text">Riels</span>
              <input type="text" class="form-control" id="price" v-model="product.price" />
            </div>
          </div>
          <!-- Description Of Product -->
          <div class="mb-3">
            <label for="desc" class="form-label">ពិពណ៍នាផលិតផល</label>
            <textarea class="form-control" id="desc" v-model="product.description"></textarea>
          </div>
          <!-- Date Of Product -->
          <div class="mb-3">
            <label for="date" class="form-label">ថ្ងៃ/ខែ/ឆ្នាំ</label>
            <input type="date" class="form-control" id="date" v-model="product.date" />
          </div>
        </div>

        <div class="col-md-6">
          <!-- Discount -->
          <div class="mb-3">
            <label for="discount" class="form-label">បញ្ចុះតម្លៃ</label>
            <input type="text" class="form-control" id="discount" v-model="product.discount" />
          </div>
          <div class="mb-3">
            <!-- Quantity Of Products -->
            <label for="quantity" class="form-label">ចំនួន</label>
            <div class="input-group">
              <input type="text" class="form-control" id="quantity" v-model="product.quantity" />
              <select class="form-select" aria-label="Select Unit" v-model="product.unit">
                <option value="Kg">Kg</option>
                <option value="Tons">Tons</option>
                <option value="Liters">Liters</option>
                <option value="Plon">Plon</option>
              </select>
            </div>
          </div>
          <!-- Category -->
          <div class="mb-3">
            <label for="category" class="form-label">ប្រភេទផលិតផល</label>
            <select class="form-select" v-model="product.category.name">
              <option value="">ជ្រើសរើស...</option>
              <option>Fruit</option>
              <option>Vegetable</option>
              <option>Fish</option>
            </select>
          </div>
          <!-- Image Of Product -->
          <div class="mb-3">
            <label for="file" class="form-label">រូបភាពផលិតផល</label>
            <input type="file" class="form-control" id="file" @change="updateImage" />
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="text-center mt-4">
        <button type="button" class="btn btn-danger" @click="closeDialog">បោះបង់</button>
        <button type="submit" class="btn btn-success ms-2" @click="submitProduct">បញ្ជូល</button>
      </div>
    </form>
  </dialog>
</template>


<script>
export default {
  name: 'FormUpdateProduct',
  props: ['product'],
  methods: {
    closeDialog() {
      this.$emit('close')
    },
    submitProduct() {
      this.$emit('submit', this.product)
    },
    updateImage(event) {
      const file = event.target.files[0]
      this.product.image = file
    }
    //edit product
  }
}
</script>


<style scoped>
.product-dialog {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 90%;
  max-width: 700px;
  background-color: #fff;
  border: 1px solid #ced4da;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  z-index: 1050; /* Ensure dialog appears above navbar */
}

.dialog-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1030; /* Ensure background appears behind dialog */
  backdrop-filter: blur(10px);
  display: none;
}

.dialog-background.active {
  display: block;
}

.form-title {
  margin-bottom: 20px;
  font-weight: bold;
  color: #333;
}

.form-label {
  font-weight: bold;
  color: #333;
}

.form-control {
  padding: 0.75rem;
  font-size: 1rem;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
}

.input-group-text {
  font-size: 1rem;
  color: #333;
}

.btn {
  padding: 0.5rem 1rem;
  font-size: 1rem;
  border-radius: 0.25rem;
}

.btn-danger {
  background-color: #dc3545;
  color: #fff;
  border: none;
}

.btn-danger:hover {
  background-color: #c82333;
}

.btn-success {
  background-color: #28a745;
  color: #fff;
  border: none;
}

.btn-success:hover {
  background-color: #218838;
}
</style>
