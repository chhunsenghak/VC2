<template>
    <WebLayout>
        <!-- <div class="wrapper"> -->
        <div class="container">
            <div class="row">
                <img src="../../../assets/images/vegetables/background-vegetable.png" alt="" class="col-ms-10 pb-5"
                style="height:400px; justify-content: space-between; display: flex;">
            
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Vegetable Category  </h2>
                </div>
            </div>
        <page-product-vegetable></page-product-vegetable>
        </div>
        <!-- </div> -->

    </WebLayout>

</template>

<script setup lang="ts">
import WebLayout from '../../../Components/Layouts/WebLayout.vue'
import PageProductVegetable from "../../../Components/Products/PageProductVegetable.vue"


</script>
