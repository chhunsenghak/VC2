<template>
    <WebLayout>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <header class="d-flex pt-5 gap-5">
            <div class="header_left">
                <img src="../../../image/02.jpg" width="620px" height="400px" id="header_photo">
            </div>
            <div class="d-flex flex-column gap-4">
                <h1 class="display-5 fw-bold">The mission and story behind</h1>
                <p class="fs-5">We want to create an e-commerce website where farmers can show and sell their products
                    on our website. Our website helps them to find marketing and solve their problems as farmers. In
                    particular, we want to increase marketing to farmers and make agriculture better in Cambodia.</p>
                <div class="d-flex gap-3">
                    <button class="btn text-white active btn-lg rounded-pill" style="background-color: #346018;">Read
                        more</button>
                    <button class="btn btn-secondary btn-lg rounded-pill">Contact us</button>
                </div>
            </div>
        </header>
        <main class="d-flex flex-column active mt-4 pt-4">
            <div class="main_rate d-flex text-white justify-content-around text-center pt-4"
                style="background-color:#346018;">
                <div class="d-flex flex-column">
                    <img src="../../../image/03.png" class="rounded-circle" style="background-color: #709e5675;" width="100px"
                        height="100px">
                    <h3>36+</h3>
                    <p>PRODUCTS</p>
                </div>
                <div class="d-flex flex-column">
                    <img src="../../../image/04.png" class="rounded-circle" style="background-color: #709e5675;" width="100px"
                        height="100px">
                    <h3>2,340+</h3>
                    <p>CUSTOMERS</p>
                </div>
                <div class="d-flex flex-column">
                    <img src="../../../image/05.png" class="rounded-circle" style="background-color: #709e5675;" width="100px"
                        height="100px">
                    <h3>20+</h3>
                    <p>EXPERIENCES</p>
                </div>
            </div>
            <section class="pt-5 d-flex flex-row gap-3">
                <div class="d-flex flex-column w-50 gap-3">
                    <div class="d-flex flex-row gap-2">
                        <i class="fa fa-leaf" style="font-size:36px; color:rgba(13, 119, 13, 0.88)"></i>
                        <h3>About us</h3>
                    </div>
                    <div class="section_second">
                        <h2>Our mission is to cultivate healthy food you and your family.</h2>
                        <p>Mission helps the Cambodian people to have a wide digital market for agricultural products,
                            which contributes to improving the living standards of Cambodian farmers and promotes
                            natural vegetables.</p>
                    </div>
                </div>
                <div
                    class="border border-5 border-success border-top-0 border-right-0 border-bottom-0 shadow p-3 mb-5 bg-light rounded w-50 d-flex flex-column gap-3 pt-4">
                    <div class="d-flex gap-3">
                        <img src="../../../image/06.jpg" class="rounded-circle" width="100" height="100px">
                        <div class="pt-4 ">
                            <h5>ChhunEii Oeuy</h5>
                            <p class="text-success">Founder of Psar-Kasekor</p>
                        </div>
                    </div>
                    <p>He wants to sell, buy his goods to people inside his country, and he wants to help farmers to
                        have a market for their agricultural product.</p>
                </div>
            </section>
            <aside class="d-flex flex-column pt-4 gap-2" style="background-color: rgba(128, 128, 128, 0.152);">
                <div class="top_container d-flex flex-row gap-2 justify-content-center">
                    <i class="fa fa-certificate" style="font-size:36px; color:rgba(13, 119, 13, 0.88)"></i>
                    <h3>Best quality</h3>
                </div>
                <h2 class="d-flex justify-content-center">Quality is more than making a good product</h2>
                <div class="bottom_container d-flex gap-2 justify-content-evenly text-center pt-4">
                    <div class="bottom">
                        <img src="../../../image/07.png" class="rounded-circle"
                            style="background-color: rgba(13, 119, 13, 0.88);" width="100px" height="100px">
                        <h4>100%Organic</h4>
                        <p>Grown without the use of synthetic chemicals</p>
                    </div>
                    <div class="bottom">
                        <img src="../../../image/08.png" class="rounded-circle"
                            style="background-color:rgba(13, 119, 13, 0.88)" width="100px" height="100px">
                        <h4>Promote</h4>
                        <p>Help promote local natural agricultural products</p>
                    </div>
                    <div class="bottom">
                        <img src="../../../image/09.png" class="rounded-circle"
                            style="background-color:rgba(13, 119, 13, 0.88)" width="100px" height="100px">
                        <h4>Local Products</h4>
                        <p>Guaranteed to be domestic goods, hand-grown, not imported</p>
                    </div>
                    <div class="bottom">
                        <img src="../../../image/10.png" class="rounded-circle"
                            style="background-color:rgba(13, 119, 13, 0.88)" width="100px" height="100px">
                        <h4>No Chemicals</h4>
                        <p>Cultivation free of chemicals and no preservatives</p>
                    </div>
                </div>
            </aside>
        </main>
    </WebLayout>

</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'


export default {
    name: 'AboutusView',
    components: {
        WebLayout
    }
}
</script>

