<template>
  <WebLayout>
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <div class="container mt-20">
      <div class="image-contact">
        <img src="../../assets/images/contact.png" class="card" />
      </div>
      <div class="d-flex justify-content-around col-12 mt-10">
        <InformationComponentVue></InformationComponentVue>
        <div class="border-start"> </div>
        <ContactComponentVue></ContactComponentVue>
      </div>
    </div>
  </WebLayout>
</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import InformationComponentVue from '@/Components/ContactUs/InformationComponent.vue'
import ContactComponentVue from '@/Components/ContactUs/ContactComponent.vue'
export default {
  name: 'Contacts',
  components: {
    WebLayout,
    InformationComponentVue,
    ContactComponentVue
  }
}
</script>
<style  scoped>


img {
  width: 100%;
}


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
</style>