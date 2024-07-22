<script setup lang="ts">
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import HeroComponent from '../../../src/Components/HomePageComponents/HeroComponent.vue'
import WhyChooseUsComponent from '../../../src/Components/HomePageComponents/WhyChooseUsComponent.vue'
import ProductComponent from '../../../src/Components/HomePageComponents/ProductComponent.vue'
import WeHelpComponent from '../../../src/Components/HomePageComponents/WeHelpComponent.vue'
import PopularProductComponent from '../../../src/Components/HomePageComponents/PopularProductComponent.vue'

</script>
<template>
  <WebLayout>
    <HeroComponent />
    <WhyChooseUsComponent />
    <ProductComponent />
    <WeHelpComponent />
    <PopularProductComponent />
  </WebLayout>
</template>
