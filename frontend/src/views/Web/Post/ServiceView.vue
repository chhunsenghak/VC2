<template>
  <WebLayout>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <div class="background-container">
      <div class="content">
        <h1>សេវាកម្មរបស់យើង</h1>
        <p>ទំនុកចិត្ត | គុណភាពខ្ពស់​​​ | អភិវឌ្ឍន៍ទីផ្សាកសិកម្ម</p>
      </div>
    </div>
    <div class="title mt-10">
      <h1 class="fw-bold">សេវាកម្មបច្ចុប្បន្នរបស់យើងខ្ញុំ</h1>
    </div>
    <div class="body d-flex justify-content-around mt-10 mb-10">
      <div class="group-card"></div>
      <div class="card" style="width: 18rem">
        <img
          src="https://cdn-icons-png.flaticon.com/128/7711/7711806.png"
          class="card-img-top w-20 p-2"
          alt="..."
        />
        <div class="card-body">
          <h5 class="card-title">លក់ទំនិញកសិកម្ម</h5>
          <p class="card-text">យើងផ្ដល់អោយអ្នកនូវសេវាកម្ម លក់ដូរនូវទំនិញផ្សេងដែលលោកអ្នកមាន...</p>
          <a href="#1" class="btn btn-success">Detail</a>
        </div>
      </div>
      <div class="card" style="width: 18rem">
        <img
          src="https://cdn-icons-png.flaticon.com/512/3930/3930285.png"
          class="card-img-top w-20 p-2"
          alt="..."
        />
        <div class="card-body">
          <h5 class="card-title">ស្វែងរកទីផ្សារកសិកម្ម</h5>
          <p class="card-text">
            យើងអាចជួយលោកអ្នកស្វែងនូវទីផ្សាលក់ផលិតផលផ្សេងៗនិងងាយស្រួលដល់ការលក់ដូររបស់អ្នក។​
            មិនតែប៉ុណ្ណោះទេ.....
          </p>
          <a href="#2" class="btn btn-success">Detail</a>
        </div>
      </div>
      <div class="card" style="width: 18rem">
        <img
          src="https://cdn-icons-png.freepik.com/512/4064/4064925.png"
          class="card-img-top w-20 p-2"
          alt="..."
        />
        <div class="card-body">
          <h5 class="card-title">ទិញទំនិញកសិកម្ម</h5>
          <p class="card-text">
            យើងផ្ដល់អោយអ្នកនូវសេវាកម្មដែលអាចទិញឬលក់ផលិតកសិកម្មរបស់អ្នក​​ ព្រមទាំង...
          </p>
          <a href="#3" class="btn btn-success">Detail</a>
        </div>
      </div>
    </div>
    <header>
      <div class="detail-service p-5 ml-5">
        <div class="service mt-10 d-flex flex-sm-row-reverse" id="1">
          <div class="text">
            <h1 class="fw-bold">លក់ទំនិញកសិកម្ម</h1>
            <p class="fs-5">យើងផ្ដល់អោយអ្នកនូវសេវាកម្ម លក់ដូរនូវទំនិញផ្សេងដែលលោកអ្នកមាន</p>
          </div>
          <div class="img">
            <img
              src="https://travelinspiredliving.com/wp-content/uploads/2020/07/Farmers-Market.jpg"
              alt=""
              width="80%"  class="rounded"
            />
          </div>
        </div>
        <div class="service mt-20 d-flex flex-sm-row-reverse" id="2">
          <div class="img mr-5">
            <img
              src="https://extension.oregonstate.edu/sites/default/files/styles/full/public/images/2022-09/screen-shot-2022-09-28-30247-pm.png?itok=a8tvsVmJ"
              alt=""
              width="100%" class="rounded"
            />
          </div>
          <div class="text">
            
          
          <h1 class="fw-bold">ស្វែងរកទីផ្សារកសិកម្ម</h1>
            <p class="fs-5">​យើងអាចជួយលោកអ្នកស្វែងនូវទីផ្សាលក់ផលិតផលផ្សេងៗនិងងាយស្រួលដល់ការលក់ដូររបស់អ្នក។​
              មិនតែប៉ុណ្ណោះទេ.....</p>
            </div>
        </div>
        <div class="service mt-20 d-flex flex-sm-row-reverse" id="3">  
          <div class="text">
            <h1 class="fw-bold">ទិញទំនិញកសិកម្ម</h1>
            <p class="fs-5">យើងផ្ដល់អោយអ្នកនូវសេវាកម្មដែលអាចទិញឬលក់ផលិតកសិកម្មរបស់អ្នក​​ ព្រមទាំង...</p>
          </div>
          <div class="img">
            <img
              src="https://producersmarket.com/blog/wp-content/uploads/2021/03/pexels-erik-scheel-95425-1024x683.jpg"
              alt=""
              width="90%" class="rounded"
            />
          </div>
        </div>
      </div>
      <!-- </div> -->
    </header>
  </WebLayout>
</template>

<script>
import WebLayout from '@/Components/Layouts/WebLayout.vue'

export default {
  name: 'ServiceView',
  components: {
    WebLayout
  }
}
</script>

<style>
.background-container {
  background-image: url('https://www.greenbaypressgazette.com/gcdn/presto/2020/06/16/PGRB/8c5a15b2-184e-43c6-8a09-e5d967b64163-Farmers_market_stand_Getty_Images.jpg'); /* Replace with your image path */
  background-size: cover;
  background-position: center;
  height: 75vh; /* Full viewport height */
  display: flex;
  justify-content: center;
  align-items: center;
  color: white; /* Text color */
}

.content {
  text-align: center;
  background: rgba(
    83,
    119,
    95,
    0.49
  ); /* Optional: Add a semi-transparent background to the content */
  padding: 20px;
  border-radius: 10px;
}
.title {
  text-align: center;
  padding: 20px;
}

.card:hover {
  transform: translateY(-20px);
  position: relative;
  width: 190px;
  height: 45vh;
  transition: 0.5s;
  cursor: pointer;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
  margin: 10px;
  background-color: rgba(255, 255, 255, 0.9);
  color: black;
  transition: 0.5s;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
}

</style>
