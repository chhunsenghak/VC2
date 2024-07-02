<template>
    <WebLayout>
        <link href="css/font-awesome.min.css" rel="stylesheet" />
        <div class="container">
            <section>
                <div class="image-contact" >
                    <img src="../../assets/images/contact.png" alt="">
                </div>
                <div class="from-contact m-5 " style="height: auto;">
                    <div class="info-right">
                        <h2>Contact Us</h2> <br>
                        <h5 style="color: #828282;">Any question? We would be <br>
                            happy to help!</h5>
                        <form action="">

                            <div class="input-container mt-5 mb-4">

                                <i class="material-icons text-blue-500 icon-xs">phone</i>
                                <input class="form-control" placeholder="+855 88 43 67 484">
                            </div>
                            <div class="input-container mb-4">
                                <!-- <span class="fa fa-envelope"></span> -->
                                <i class="material-icons text-blue-500 icon-xs">email</i>
                                <input type="email" class="form-control" placeholder="sokuntheapoeun4@gmail.com">
                            </div>
                            <div class="input-container mb-4">
                                <i class="material-icons text-blue-500 icon-xs">location_on</i>

                                <input type="address" class="form-control" placeholder="BP 511, Street 371, Phnom Penh">
                            </div>

                        </form>
                    </div>
                    <div class="info-left">
                        <form class="row g-3">
                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">First Name:</label>
                                <input type="text" class="form-control" id="inputFirstName"
                                    placeholder="Your first name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputLastName" class="form-label">Last Name:</label>
                                <input type="text" class="form-control" id="inputLastName" placeholder="Your last name">
                            </div>
                            <div class="col-12 mt-4">
                                <label for="inputEmail;" class="form-label">Email:</label>
                                <input type="text" class="form-control" id="inputPhone"
                                    placeholder="youremail@gamil.com">
                            </div>
                            <div class="col-12 mt-4">
                                <label for="inputPhone" class="form-label">Phone Number:</label>
                                <input type="text" class="form-control" id="inputPhone">
                            </div>
                            <div class="col-12 mt-4">
                                <label for="desc" class="form-label">Message:</label>
                                <textarea class="form-control" style="background: #ecf2f3; border: 1px solid #89AD6C;"
                                    id="desc" name="desc" rows="6" placeholder="Type your message here..."></textarea>
                            </div>
                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-success"
                                    style="width: 100%;background-color: #416831; height: 50px; font-size: 20px;">
                                    SendMessage</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </WebLayout>

</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'


export default {
    name: 'Contacts',
    components: {
        WebLayout
    }
}
</script>
<style>
img {
    width: 100%;
}

.from-contact {
    display: flex;

}

.info-right {
    flex: 2;
    /* background-color: #9fcf69; */
    padding-left: 5%;

}

.info-right input {
    border: 1px solid #89AD6C;
    border-radius: 5px;
    outline: none;
    height: 50px;
    width: 70%;
}

.info-right h2 {
    color: #40740C;
    font-weight: bold;

}

.info-left {
    flex: 3;
    /* background-color: #b61522; */
    padding-left: 40px;
    border-left: 3px solid #89AD6C;
}

.info-right input {
    border: 1px solid #89AD6C;
    border-radius: 5px;
    outline: none;
    height: 50px;
    width: 70%;
}

.info-right input {
    border: 1px solid #89AD6C;
    border-radius: 5px;
    outline: none;
    height: 50px;
    width: 70%;
}

.info-left input {
    border: 1px solid #89AD6C;
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
    color: #40740C;
}

.input-container input {
    padding-left: 40px;

}
</style>