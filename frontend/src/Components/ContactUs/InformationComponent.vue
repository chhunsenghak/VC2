<template>
  
    <div class="contact-info col-5 text-center​ mt-3 ">
      <h2 class="text-center">ទំនាក់ទំនងមកកាន់ពួកយើង</h2>
      <br>
      <h5 class="text-center">
        ប្រសិនបើមានចម្ងល់ពីសេវាកម្មផ្សេងៗ
        ពួកយើងរីករាយជានិច្ចក្នុងការឆ្លើយរាល់ចម្ងល់របស់ពុកម៉ែបងប្អូន!
      </h5>

      <div class="mt-5">
        <div class="input-container mb-4">
          <i class="material-icons text-blue-500 icon-xs">phone</i>
          <input class="form-control"  style="border: none;" disabled placeholder="+855 88 43 67 484" />
        </div>
        <div class="input-container mb-4">
          <!-- <span class="fa fa-envelope"></span> -->
          <i class="material-icons text-blue-500 icon-xs">email</i>
          <input type="email" class="form-control" style="border: none;" disabled placeholder="sokuntheapoeun4@gmail.com" />
        </div>
        <div class="input-container mb-4">
          <i class="material-icons text-blue-500 icon-xs">location_on</i>
          <input type="address" class="form-control" style="border: none;" disabled placeholder="BP 511, Street 371, Phnom Penh" />
        </div>
      </div>
    </div>
  
</template>

<script>
export default {}
</script>

<style>
.info-right input {
  border: 1px solid #89ad6c;
  border-radius: 5px;
  outline: none;
  height: 50px;
  width: 70%;
}

.info-left input {
  border: 1px solid #89ad6c;
  background-color: #ecf2f3;
  border-radius: 5px;
  padding: 10px;
  outline: none;
  width: 100%;
}

.input-container {
  position: relative;
}

.input-container i {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 15px;
  font-size: 1.2em;
  color: #40740c;
}

.input-container input {
  padding-left: 40px;
}
@media (min-width: 768px) and (max-width: 1024px) {
  .contact-info{
    padding: 10px;
    /* background: red; */
  }
  .contact-info h2{
    font-size: 24px;
  }
  .contact-info h5{
    font-size: 15px;
  }
}
@media (min-width: 428px) and (max-width:768px) {
  .contact-info{
    padding: 10px;
  }
  .contact-info h2{
    font-size: 22px;
  }
  .contact-info h5{
    font-size: 11px;
  }
 
}
</style>