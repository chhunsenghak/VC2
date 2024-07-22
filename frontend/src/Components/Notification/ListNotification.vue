<template>
    <div class="noti mt-2 ml-4" @click="dialogVisible = true">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-bell-fill"
            viewBox="0 0 16 16">
            <path
                d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
        </svg>
        <span class="badge rounded-pill badge-notification bg-danger position-absolute translate-middle">4</span>
    </div>
    <el-dialog v-model="dialogVisible" title="ព័ត៍មាន​​ ឬសារជូនដំណឹង" width="500" :before-close="handleClose">
        <div class="card  border-2 mb-2 " style="max-width: 28rem">
            <div class="card-header bg-transparent d-flex flex-direction-column justify-content-between text-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#F19E39">
                    <path
                        d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
                </svg>
                <h5>ព័ត៍មាន!</h5>
                <p>Today</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">ផលិតផលថ្មីៗ</h5>
                <p class="card-text">សួរស្ដី​! យើ​​ងបាននាំចូលនូវផលិតផលថ្មីៗដល់លោកអ្នក</p>
            </div>
        </div>
        <div class="card border-2 mb-2 " style="max-width: 28rem">
            <div class="card-header bg-transparent d-flex flex-direction-column justify-content-between text-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#F19E39">
                    <path
                        d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
                </svg>
                <h4>សារជូនដំណឹង!</h4>
                <p>Today</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">ផ្លាស់ប្ដូរ​លេខសម្ងាត់</h5>
                <p class="card-text">ផ្លាស់ប្ដូរលេខសម្ងាត់បានជោគជ័យ</p>
            </div>
        </div>
        <div class="card  border-2 mb-2 " style="max-width: 28rem">
            <div class="card-header bg-transparent d-flex flex-direction-column justify-content-between text-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#F19E39">
                    <path
                        d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
                </svg>
                <h4>សារជូនដំណឹង!</h4>
                <p>Today</p>
            </div>
            <div class="card-body">
                <h5 class="card-title">បញ្ចូលផលិតផល</h5>
                <p class="card-text">ការបញ្ចូលផលិតផលរបស់អ្នកបានជោគជ័យ</p>
            </div>
        </div>
        <div class="card border-2 mb-2" style="max-width: 28rem">
            <div class="card-header bg-transparent d-flex flex-direction-column justify-content-between text-center">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                    fill="#F19E39">
                    <path
                        d="M160-200v-80h80v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h80v80H160Zm320-300Zm0 420q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM320-280h320v-280q0-66-47-113t-113-47q-66 0-113 47t-47 113v280Z" />
                </svg>
                <h4>សារជូនដំណឹង!</h4>
                <p>Yesterday</p>
            </div>
            <div class="card-body ">
                <h5 class="card-title">ការបង្កើតហាង</h5>
                <p class="card-text">ការបង្កើតហាងរបស់អ្នកទទួលបានជោគជ័ត​ លោកអ្នកអាចចាប់ផ្ដើមលក់និងទិញផលិតផលនៅលើ​
                    Website
                    ដោយប្រើអាខោនរបស់អ្នក </p>
            </div>
        </div>
        <template #footer>
            <div class="dialog-footer">
                <el-button @click="dialogVisible = false">បោះបង់</el-button>
                <el-button type="primary" @click="dialogVisible = false"> ចែករំលែក </el-button>
            </div>
        </template>
    </el-dialog>
</template>

<script>
export default {

}
</script>

<style></style>