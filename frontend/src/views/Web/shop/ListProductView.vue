<template>
    <WebLayout>
        <!-- <div class="wrapper"> -->
        <div class="container">
            <div class="row">
                <div class="col-md-12 p-5 "
                    style="background-color: #A9EAA8; height: 60vh; justify-content: space-between; display: flex;">
                    <div class="info-text mt-5 ml-10">
                        <h1>GROCERY STORE </h1>
                        <h3>Fresh fruit & Vegetables <br>
                            at Your Doorstep
                        </h3> <br>
                        <button class=" btn btn-danger">Shop Now</button>
                    </div>
                    <img src="/src/assets/images/image 74.png" alt="" class=" mr-9" style=" height: 50vh;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 p-5">
                    <h2 class="text-center">Listing Category</h2>
                </div>
            </div>
            <div class="row"  style="height: 30vh; background: #E8E8E8; ">

            <!-- start of category -->

            <div class=" d-flex align-items-center justify-content-evenly ">
                <div class=" justify-content-center align-items-center  text-align-center " style=" margin: 15px;">
                    <a href="/"><img src="../../../assets/images/Meat/raw meats.png" class=" rounded-circle p-2"
                            style=" background-color: white; width: 100px;height: 100px;" alt=""></a>
                    <h6 class="card-title mt-2">Meat</h6>
                </div>
                <div class=" justify-content-center align-items-center  text-align-center " style=" margin: 15px;">
                    <a href="#"><img src="../../../assets/images/vegetables/Carrot.png" class=" rounded-circle p-1"
                            style=" background-color: white; width: 100px;height: 100px;" alt=""></a>
                    <h6 class="card-title mt-2">Watermelon</h6>
                </div>
                <div class=" justify-content-center align-items-center  text-align-center " style=" margin: 15px;">
                    <a href="#"><img src="../../../assets/images/vegetables/Cauliflower.png" class=" rounded-circle p-1"
                            style=" background-color: white; width: 100px;height: 100px;" alt=""></a>
                    <h6 class="card-title mt-2">Watermelon</h6>
                </div>
                <div class=" justify-content-center align-items-center  text-align-center " style=" margin: 15px;">
                    <a href="#"><img src="../../../assets/images/vegetables/Eggplant.png" class=" rounded-circle p-1"
                            style=" background-color: white; width: 100px;height: 100px;" alt=""></a>
                    <h6 class="card-title mt-2">Watermelon</h6>
                </div>
                <div class=" justify-content-center align-items-center  text-align-center " style=" margin: 15px;">
                    <a href="#"><img src="../../../assets/images/vegetables/broccoli.png" class=" rounded-circle p-1"
                            style=" background-color: white; width: 100px;height: 100px;" alt=""></a>
                    <h6 class="card-title mt-2">Watermelon</h6>
                </div>
                <div class=" justify-content-center align-items-center  text-align-center " style=" margin: 15px;">
                    <a href="#"><img src="../../../assets/images/vegetables/Lettuce.png" class=" rounded-circle p-1"
                            style=" background-color: white; width: 100px;height: 100px;" alt=""></a>
                    <h6 class="card-title mt-2">Watermelon</h6>
                </div>
                <div class=" justify-content-center align-items-center  text-align-center " style=" margin: 15px;">
                    <a href="#"><img src="../../../assets/images/vegetables/Pumpkin.png" class=" rounded-circle p-1"
                            style=" background-color: white; width: 100px;height: 100px;" alt=""></a>
                    <h6 class="card-title mt-2">Watermelon</h6>
                </div>
                <div class=" justify-content-center align-items-center  text-align-center " style=" margin: 15px;">
                    <a href="#"><img src="../../../assets/images/vegetables/Red onion.png" class=" rounded-circle p-1"
                            style=" background-color: white; width: 100px;height: 100px;" alt=""></a>
                    <h6 class="card-title mt-2">Watermelon</h6>
                </div>
                <div class=" justify-content-center align-items-center  text-align-center " style=" margin: 15px;">
                    <a href="#"><img src="../../../assets/images/vegetables/Watermelon.png" class=" rounded-circle p-1"
                            style=" background-color: white; width: 100px;height: 100px;" alt=""></a>
                    <h6 class="card-title mt-2">Watermelon</h6>
                </div>

            </div>

            <!-- end of category  -->

        </div>

        <list-card-product></list-card-product>
        </div>
        <!-- </div> -->

    </WebLayout>

</template>

<script setup lang="ts">
import WebLayout from '../../../Components/Layouts/WebLayout.vue'
import ListCardProduct from "../../../Components/shop/ListCardProduct.vue"


</script>
