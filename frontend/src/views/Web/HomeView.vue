<script setup lang="ts">
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import HeroComponent from '../../../src/Components/HomePageComponents/HeroComponent.vue';
import WhyChooseUsComponent from '../../../src/Components/HomePageComponents/WhyChooseUsComponent.vue';
import ProductComponent from '../../../src/Components/HomePageComponents/ProductComponent.vue';
import WeHelpComponent from '../../../src/Components/HomePageComponents/WeHelpComponent.vue';

</script>
<template>
  <WebLayout>
    <!-- Start Hero Section -->
    <HeroComponent />
    <!-- end Hero Section -->
    <!-- Start Product Section -->
    <ProductComponent />
    <!-- End Product Section -->
    <!-- Start Why Choose Us Section -->
    <WhyChooseUsComponent />
     <!-- Start Why Choose Us Section -->
    <!-- Start We Help Section -->
    <WeHelpComponent />
    <!-- End We Help Section -->

  </WebLayout>
</template>
