<script setup lang="ts">
import WebLayout from '@/Components/Layouts/WebLayout.vue'
import HeroComponent from '../../../src/Components/HomePageComponents/HeroComponent.vue'
import WhyChooseUsComponent from '../../../src/Components/HomePageComponents/WhyChooseUsComponent.vue'
import ProductComponent from '../../../src/Components/HomePageComponents/ProductComponent.vue'
import WeHelpComponent from '../../../src/Components/HomePageComponents/WeHelpComponent.vue'
import PopularProductComponent from '../../../src/Components/HomePageComponents/PopularProductComponent.vue'
// import TestimonialSliderComponent from '../../../src/Components/HomePageComponents/TestimonialSliderComponent.vue'
import BlogComponent from '../.././../src/Components/HomePageComponents/BlogComponent.vue'
</script>
<template>
  <WebLayout>
    <!-- Start Hero Section -->
    <HeroComponent />
    <!-- end Hero Section -->

    <!-- Start Why Choose Us Section -->
    <WhyChooseUsComponent />
    <!-- Start Product Section -->
    <ProductComponent />
    <!-- End Product Section -->
    <!-- Start We Help Section -->
    <WeHelpComponent />
    <!-- End We Help Section -->

    <!-- Start Blog Section -->
    <BlogComponent />
    <!-- End Blog Section -->

    <!-- Start Popular Product -->
    <PopularProductComponent />
    <!-- End Popular Product -->
  </WebLayout>
</template>
