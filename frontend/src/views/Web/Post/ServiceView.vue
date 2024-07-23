<template>
  <WebLayout>
    <div class="container">
      <!-- Banner Section -->
      <div class="background-container text-light">
        <div class="content">
          <h3 class="fw-bold">សេវាកម្មរបស់យើង</h3>
          <p class="fs-4">ទំនុកចិត្ត | គុណភាពខ្ពស់​​​ | អភិវឌ្ឍន៍ទីផ្សាកសិកម្ម</p>
        </div>
      </div>

      <!-- Title Section -->
      <div class="title mt-10">
        <h3 class="fw-bold">សេវាកម្មបច្ចុប្បន្នរបស់យើងខ្ញុំ</h3>
      </div>

      <!-- Services Section -->
      <div class="detail-service mr-10 mb-10 p-15">
        <!-- Service 1 -->
        <div class="service1 mt-10 d-flex" id="1">
          <div class="text">
            <h3 class="fw-bold">លក់ទំនិញកសិកម្ម</h3>
            <p class="fs-5">
              យើងផ្ដល់អោយអ្នកនូវសេវាកម្ម លក់ដូរនូវទំនិញផ្សេងដែលលោកអ្នកមាន។​​
              ពួកយើងជួយលោកអ្នកក្នុងការដោះស្រាយនូវបញ្ហាគ្មានទីផ្សារពិបាកក្នុងការលក់ផលិតផលកសិកម្ម
              អីឡូវនេះអស់បារម្ភជាមួយសេវាកម្មរលក់ទំនិញកសិកម្មរបស់យើង។​ <br />
              អ្នកអាចផុសផលិតផលដែលមាននៅលើWebsiteយើងបានដោយងាយស្រួលនិងលក់ដោយមានប្រសិទ្ធភាព។
            </p>
          </div>
          <div class="img1">
            <img
              src="https://travelinspiredliving.com/wp-content/uploads/2020/07/Farmers-Market.jpg"
              alt=""
              class="rounded"
            />
          </div>
        </div>

        <!-- Service 2 -->
        <div class="service2 mt-30 d-flex flex-sm-row-reverse" id="2">
          <div class="text">
            <h3 class="fw-bold">ស្វែងរកទីផ្សារកសិកម្ម</h3>
            <p class="fs-5">
              ​យើងអាចជួយលោកអ្នកស្វែងនូវទីផ្សាលក់ផលិតផលផ្សេងៗនិងងាយស្រួលដល់ការលក់ដូររបស់អ្នក។​
              មិនតែប៉ុណ្ណោះទេ យើងជាផ្នែកមួយក្នុងការធ្វើអោយអាជីវកម្មលោកអ្នកកាន់តែរីកចម្រើន
              និងងាយស្រួលដល់ប្រជាជនកសិករគ្រប់រូប។
            </p>
          </div>
          <div class="img2">
            <img
              src="https://extension.oregonstate.edu/sites/default/files/styles/full/public/images/2022-09/screen-shot-2022-09-28-30247-pm.png?itok=a8tvsVmJ"
              alt=""
              class="rounded"
            />
          </div>
        </div>

        <!-- Service 3 -->
        <div class="service3 mt-20" id="3">
          <div class="text">
            <h3 class="fw-bold">ទិញទំនិញកសិកម្ម</h3>
            <p class="fs-5">
              យើងផ្ដល់អោយអ្នកនូវសេវាកម្មដែលអាចទិញឬលក់ផលិតកសិកម្មរបស់អ្នក​​។
              អ្នកអាចស្វែងរកនូវផលិតផលកសិកម្មណាមួយដែលអ្នកត្រូវការនៅលើWebsiteយើងដោយទំនុកចិត្ត។
            </p>
          </div>
          <div class="img3">
            <img
              src="https://media.istockphoto.com/id/1159376930/photo/vegetables-and-fruit-in-reusable-bag-on-a-farmers-market-zero-waste-concept.jpg?s=612x612&w=0&k=20&c=rvK_UPWYJ8vdCzucmZwY1kzS7pc7DtmdjA8J43i1cek="
              alt=""
              class="rounded"
            />
          </div>
        </div>
      </div>
    </div>
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
  position: relative;
  background-position: center;
  background-image: url('https://thebettercambodia.com/wp-content/uploads/2022/09/middle-aged-asian-farmer-man-scaled.jpg');
  background-size: cover;
  margin-top: 5%;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 70vh;
  overflow: hidden;
  transition: background 0.3s ease;
}

.background-container::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
  z-index: 1;
  transition: background 0.3s ease;
}

.background-container:hover::before {
  background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7));
}

.content {
  position: relative;
  text-align: center;
  background: rgba(55, 58, 56, 0.7);
  padding: 20px;
  border-radius: 10px;
  z-index: 2;
  transition: background 0.3s ease;
}

.background-container:hover .content {
  background: rgba(55, 58, 56, 0.9);
}

.title {
  text-align: center;
  padding: 20px;
}

.card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  position: relative;
  overflow: hidden;
  border-radius: 10px;
}

.card:hover {
  transform: scale(1.05);
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.card-img-top {
  transition: transform 0.3s ease;
}

.card:hover .card-img-top {
  transform: scale(1.1);
}

.group-card {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  gap: 20px;
}

.detail-service {
  width: 100%;
}

.service1,
.service2,
.service3 {
  display: flex;
  flex-direction: row;
  align-items: center;
  margin-bottom: 40px;
  transition: background 0.3s ease, transform 0.3s ease;
  border-radius: 10px;
  padding: 20px;
}

.service1:hover,
.service2:hover,
.service3:hover {
  background: rgba(0, 0, 0, 0.05);
  transform: translateY(-5px);
}

.service1 .text,
.service2 .text,
.service3 .text {
  flex: 1;
  padding: 20px;
  transition: color 0.3s ease;
}

.service1 .img1,
.service2 .img2,
.service3 .img3 {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
}

.service1 .img1 img,
.service2 .img2 img,
.service3 .img3 img {
  width: 100%;
  border-radius: 10px;
  transition: transform 0.3s ease;
}

@media (max-width: 768px) {
  .background-container {
    height: 35vh;
  }

  .service1,
  .service2,
  .service3 {
    flex-direction: column;
  }

  .service1 .text,
  .service2 .text,
  .service3 .text,
  .service1 .img1,
  .service2 .img2,
  .service3 .img3 {
    width: 100%;
    text-align: center;
  }

  .service1 .img1 img,
  .service2 .img2 img,
  .service3 .img3 img {
    width: 100%;
  }
}
</style>
