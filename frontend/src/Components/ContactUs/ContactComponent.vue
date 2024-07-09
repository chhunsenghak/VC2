<template>
  <div class="col-5">
    <form class="row g-3 mb-5">
      <div class="col-md-6">
        <label for="inputFirstName" class="form-label">នាមខ្លួន:</label>
        <input type="text" class="form-control" id="inputFirstName" placeholder="បំពេញនាមខ្លួន" />
      </div>
      <div class="col-md-6">
        <label for="inputLastName" class="form-label">នាមត្រកូល:</label>
        <input type="text" class="form-control" id="inputLastName" placeholder="បំពេញនាមត្រកូល" />
      </div>
      <div class="col-12 mt-3">
        <label for="inputEmail;" class="form-label">អ៊ីមែល</label>
        <input type="text" class="form-control" id="inputPhone" placeholder="youremail@gamil.com" />
      </div>
      <div class="col-12 mt-3">
        <label for="inputPhone" class="form-label">លេខទូរស័ព្ទ:</label>
        <input type="text" class="form-control" id="inputPhone" />
      </div>
      <div class="col-12 mt-3">
        <label for="desc" class="form-label">ពីព័រណ៍</label>
        <textarea class="form-control" id="desc" name="desc" rows="3" placeholder="បញ្ជូនអត្ថបទនៅទីនេះ"></textarea>
      </div>
      <div class="text-center">
        <button type="submit" style="background-color: green; width: 100px; color: white" class="btn text-white​">
          ផ្ញើរ
        </button>
      </div>
    </form>
  </div>
</template>

<script>
export default {}
</script>

<style>

</style>