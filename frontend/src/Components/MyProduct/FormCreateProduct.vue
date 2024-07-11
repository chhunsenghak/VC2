<template>
  <button class="btn btn-success w-20 ml-183" @click="openDialog">បង្កើត</button>
  <div class="dialog-background" v-if="isDialogOpen" @click="closeDialog"></div>
  <dialog ref="productDialog" class="product-dialog">
    <!--Form Create New Products-->
    <h4 class="text-center mb-4 fw-bold">បង្កើតផលិតផល</h4>
    <form @submit.prevent="submitProduct" class="product-form">
      <div class="row">
        <div class="col-md-6">
          <!-- Name Of Product -->
          <div class="mb-3">
            <label for="name" class="form-label">ឈ្មោះផលិតផល</label>
            <input type="text" class="form-control" id="name" />
          </div>
          <!-- Price Of Product -->
          <div class="mb-3">
            <label for="price" class="form-label">តម្លៃ</label>
            <div class="input-group">
              <span class="input-group-text">Riels</span>
              <input type="text" class="form-control" id="price" />
            </div>
          </div>
          <!-- Description Of Product -->
          <div class="mb-3">
            <label for="desc" class="form-label">ពិពណ៍នាផលិតផល</label>
            <textarea type="text" class="form-control" id="desc"></textarea>
          </div>
          <!-- Date Of Product -->
          <div class="mb-3">
            <label for="date" class="form-label">ថ្ងៃ/ខែ/ឆ្នាំ</label>
            <input type="date" class="form-control" id="date" />
          </div>
        </div>

        <div class="col-md-6">
          <!-- Discount -->
          <div class="mb-3">
            <label for="discount" class="form-label">បញ្ចុះតម្លៃ</label>
            <input type="text" class="form-control" id="discount" />
          </div>
          <div class="mb-3">
            <!-- Quantity Of Products -->
            <label for="quantity" class="form-label">ចំនួន</label>
            <div class="input-group">
              <input type="text" class="form-control w-50" id="quantity" />
              <select class="form-select input-group-text" aria-label="Select Unit">
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
            <select class="form-select">
              <option value="">ជ្រើសរើស...</option>
              <option>Fruit</option>
              <option>Vegetable</option>
              <option>Fish</option>
            </select>
          </div>
          <!-- Image Of Product -->
          <div class="mb-3 mt-5">
            <label for="file" class="form-label">រូបភាពផលិតផល</label>
            <input type="file" class="form-control" id="file" />
          </div>
        </div>
      </div>

      <!-- Action Buttons -->
      <div class="text-center mt-4">
        <button type="button" class="btn btn-danger ms-2" @click="closeDialog">បោះបង់</button>
        <button type="submit" class="btn btn-success w-20 ml-10">បញ្ជូល</button>
      </div>
    </form>
  </dialog>
</template>

<script>
export default {
  name: 'FormCreateProduct',
  data() {
    return {
      isDialogOpen: false
    }
  },
  methods: {
    openDialog() {
      this.isDialogOpen = true
      this.$refs.productDialog.showModal()
    },
    closeDialog() {
      this.isDialogOpen = false
      this.$refs.productDialog.close()
    },
    submitProduct() {
      this.closeDialog()
    }
  }
}
</script>


<style scoped>
.product-dialog {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 90%; /* Adjust width as needed */
  max-width: 700px; /* Optional: Set maximum width */
  background-color: #f8f9fa; /* Light gray background */
  border: 1px solid #ced4da;
  border-radius: 8px;
  padding: 20px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15); /* Soft shadow */
  z-index: 1000; /* Ensure dialog appears above background */
}

.dialog-background {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
  z-index: 999; /* Ensure background appears behind dialog */
  backdrop-filter: blur(10px); /* Adjust the blur radius as needed */
  -webkit-backdrop-filter: blur(10px); /* For Safari */
  display: none;
}

.dialog-background.active {
  display: block;
}

.product-card {
  position: relative;
  overflow: hidden;
}

.product-card img {
  transition: transform 0.3s ease-in-out;
}

.product-card:hover img {
  transform: scale(1.1);
}

.card-icons {
  position: absolute;
  top: 10px;
  right: 10px;
  opacity: 0;
  transition: opacity 0.3s ease-in-out;
}

.product-card:hover .card-icons {
  opacity: 1;
}

.card-icons i {
  cursor: pointer;
  margin-left: 10px;
}

.card-icons i:hover {
  transform: scale(1.2);
  transition: transform 0.2s ease-in-out;
}
.form-group {
  margin-bottom: 1.5rem;
}

.form-label {
  font-weight: bold;
}

.form-control {
  padding: 0.75rem;
  font-size: 1rem;
  border: 1px solid #ced4da;
  border-radius: 0.25rem;
}

.btn-primary {
  background-color: #007bff;
  color: #ffffff;
  border: none;
}

.btn-primary:hover {
  background-color: #0056b3;
}

.btn-secondary {
  background-color: #6c757d;
  color: #ffffff;
  border: none;
}

.btn-secondary:hover {
  background-color: #5a6268;
}
</style>