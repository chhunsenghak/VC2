<template>
  <WebLayout>
    <div class="container mt-20">
      <div class="image-contact">
        <img src="../../assets/images/contact.png" class="card" />
      </div>
      <div class="d-flex justify-content-around col-12 mt-10">
        <InformationComponentVue></InformationComponentVue>
        <div class="border-start"></div>
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
<style scoped>
img {
  width: 100%;
}


</style>