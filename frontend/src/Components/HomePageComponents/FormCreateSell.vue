<template>
  <WebLayout>
    <div class="container mt-20 d-flex justify-content-center rounded text-light">
      <div class="form d-flex text-dark p-10">
        <div class="left-form">
          <img
            class="rounded-circle"
            src="https://images.pexels.com/photos/374074/pexels-photo-374074.jpeg?cs=srgb&dl=pexels-burst-374074.jpg&fm=jpg"
            width="60%"
            height="400vh"
            alt=""
          />
          <h1 class="mt-10 fw-bold">ចាំផ្ដើមដោយទំនុកចិត្ត</h1>
        </div>
        <div class="right-form p-10  rounded-2">
          <div class="title">
            <h1 class="fw-bold">បំពេញព័ត៍មានខាងក្រោមដើម្បីចាប់ផ្ដើមលក់ផលិតផល: </h1>
          </div>
          <div class="row mb-3 mt-10">
            <label for="inputEmail3" class="col-sm-2 col-form-label">ឈ្មោះ:</label>
            <div class="col-sm-10">
              <input type="name" class="form-control" id="name" />
            </div>
          </div>
          <div class="row mb-3">
            <label for="phone" class="col-sm-2 col-form-label">លេខទូរសព្ទ័: </label>
            <div class="col-sm-10">
              <input type="phone" class="form-control" />
            </div>
          </div>
          <div class="row mb-3">
            <label for="location" class="col-sm-2 col-form-label">អាស័យដ្ឋាន:</label>
            <div class="col-sm-10">
              <input type="location" class="form-control" />
            </div>
          </div>
          <div class="row mb-3">
            <label for="reason" class="col-sm-2 col-form-label">មូលហេតុ:</label>
            <div class="col-sm-10">
              <input type="location" class="form-control" />
            </div>
          </div>
          <div class=" check row mb-3 " >
            <legend class="col-form-label col-sm-2 pt-0">ភេទ:</legend>
            <div class="col-sm-10">
              <div class="form-check " >
                <input
                  class="form-check-input"
                  type="radio"
                  name="gridRadios"
                  id="gridRadios1"
                  value="option1"
                  checked
                />
                <label class="form-check-label" for="gridRadios1"> ស្រី </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="radio"
                  name="gridRadios"
                  id="gridRadios2"
                  value="option2"
                />
                <label class="form-check-label" for="gridRadios2"> ប្រុស </label>
              </div>
            </div>
          </div>
          <div class="button-form d-flex justify-content-around">
            <h2><a href="/#" class="btn btn-danger me-2">បោះបង់</a></h2>
            <h2><a href="" class="btn btn-secondary me-2 text-light">បង្កើត</a></h2>
          </div>
        </div>
      </div>
    </div>
  </WebLayout>
</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'

export default {
  name: 'Form_CreateSelling',
  components: {
    WebLayout
  }
}
</script>

<style>
.form {
  height: 100vh;
}
.right-form {
  width: 50%;
}
.right-form:hover {
  background-color: rgb(47, 122, 47);
  width: 50%;
  color: white;
  transition: background-color 0.3s ease-in-out;
}

.left-form {
  width: 50%;
  text-align: center;
  padding-top: 100px;
}
button {
  width: 150px;
  margin: 10px;
}

@media (max-width: 768px){
  .form{
    margin: 0;
    padding: 5%;
    flex-direction: column;
    align-items: center;
    margin-bottom: 40%;
  }
  .left-form{
    margin-bottom: 15px;
    width: 100%;
  }
  .right-form{
    
    width: 100%;
  }
  .right-form:hover{
    width: 100%;
  }
}

@media (min-width: 428px) and (max-width:768px){
  .form{
    margin-top: 20%;
    height: 50%;
    margin: 0;
    padding: 0;
    flex-direction: column;
    align-items: center;
  }
  .left-form>img{
    width: 100%;
    height: 45vh;

  }
  .left-form{
    margin-top:20%;
  }
  .right-form{
    width: 100%;
  }

}

</style>
