<template>

    <WebLayout>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 p-5 "
                        style="background-color: #A9EAA8; height: 60vh; justify-content: space-between; display: flex;">
                        <div class="info-text mt-5 ml-10" >
                            <h1>GROCERY STORE </h1>
                            <h3>Fresh fruit & Vegetables <br>
                                at Your Doorstep
                            </h3> <br>
                            <button class=" btn btn-danger">Shop Now</button>
                        </div>
                        <img src="/src/assets/images/image 74.png" alt="" class=" mr-9" style=" height: 50vh;">
                    </div>
                </div>
            </div>
        </div>
    </WebLayout>

</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'






export default {
    name: 'shop',
    components: {
        WebLayout
    }
}
</script>
