<template>
  <WebLayout>
    <div class="timeline ">
      <h2 class="mb-20">លក្ខខណ្ឌនឹងសារះប្រយោជន៍មួយចំនួនដែលអ្នកលក់គួរតែដឹង៖ </h2>
      <div class="container left">
        <div class="content">
          <p>នៅពេលដែលអ្នកដាក់លក់នូវទំនិញឬផលិតផលរបស់អ្នកដំបូង យើងនឹងមានការហ្រ្វី​​​​​​​​​​​​​កំណត់ជូននូវរាល់ទំនិញណាដែលអ្នកចង់ដាក់លក់។</p>
        </div>
      </div>
      <div class="container right">
        <div class="content">
          <p>ប៉ុន្តែប្រសិនបើអ្នកចង់បន្ថែមនូវការលក់របស់អ្នកត្រូវបានលើសកំណត់ ដែលយើងបានកំណត់ នោះអ្នកនឹងត្រូវធ្វើការបង់នូវថិវិកា។</p>
        </div>
      </div>
      <div class="container left">
        <div class="content">
          <p>រាល់ការដាក់លក់ទំនិញដែល​មានចំនួនលើសកំណត់ យើងនឹងផ្តល់ជូននូវទម្រង់លក្ខខណ្ឌដែលអ្នកត្រូវ <br> បង់ថិវិការមកកាន់យើង។</p>
        </div>
      </div>
      <div class="container right">
        <div class="content">
          <p>នៅពេលដែលអ្នកបង់រូចរាល់ហើយ នោះអ្នកនឹងអាចផុសទំនិញ​ប្រកបជាមួយនឹងគុណភាព ការលក់ទំនិញដោយសេរី...</p>
        </div>
      </div>
      <div class="container left">
        <div class="content">
          <p>ទំនិញទាំងអស់នឹងត្រូវបានគ្រប់គ្រងដោយអ្នកផ្ទាល់ ពិតជាអស្ចារ្យណាស់ជាមួយនឹង​​ <strong>ផ្សារកសិករ</strong></p>
        </div>
      </div><br>
      <!-- <div class="container right">
        <div class="content">
          <p></p>
        </div>
      </div><br> -->
      <p class="mt-5"><strong>*ចំណាំ:  ប្រសិនបើអ្នកមានបញ្ហាចម្ងល់មិនយល់ត្រង់ណា អ្នកអាចទាក់ទងមកកាន់យើងខ្ញុំផ្ទាល់�</strong></p>
    </div>

  </WebLayout>
</template>

<script>
import WebLayout from '../../../Components/Layouts/WebLayout.vue'
export default {
  name: 'Condition',
  components: {
    WebLayout
  }
}
</script>

<style scoped>
.container-title {
  /* padding: 10px 60px; */
  display: flex;
  align-items: center;
  justify-content: start;
  margin-left: 10%;
  /* width:80%; */
  /* height: 50vh; */
  /* background-color: green; */
  /* background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6sG6z7CnE44rrDxiTYPrHsigAvH3s3yxasw&s'); */
  background-position: center;
  background-size: cover;
  border-radius: 0.25rem;
  /* color: white; */

}

/* The actual timeline (the vertical ruler) */
.timeline {
  position: relative;
  max-width: 1000px;
  margin: 0 auto;
  /* background-color: #FF9F55; */
  margin-top: 10%;
  margin-bottom: 30px;
}

/* The actual timeline (the vertical ruler) */
.timeline::after {
  content: '';
  position: absolute;
  width: 6px;
  background-color: rgb(10, 140, 71);
  /* top: 8; */
  bottom: 0;
  left: 50%;
  margin-left: -3px;
}

/* Container around content */
.container {
  padding: 10px 35px;
  position: relative;
  width: 50%;
  background-color: rgb(172, 217, 168);
  border-radius: 10px 10px;

}

/* The circles on the timeline */
.container::after {
  content: '';
  position: absolute;
  width: 25px;
  height: 25px;
  right: -13px;
  background-color: white;
  border: 4px solid #ecd123;
  top: 15px;
  border-radius: 50%;
  z-index: 1;
}

/* Place the container to the left */
.left {
  right: 25%;
}

/* Place the container to the right */
.right {
  left: 25%;
}

/* Add arrows to the left container (pointing right) */
.left::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 21px;
  width: 0;
  z-index: 1;
  right: 25px;
  border: medium solid white;
  border-width: 10px 0 10px 10px;
  border-color: transparent transparent transparent white;
}

/* Add arrows to the right container (pointing left) */
.right::before {
  content: " ";
  height: 0;
  position: absolute;
  top: 21px;
  width: 0;
  z-index: 1;
  left: 25px;
  border: medium solid white;
  border-width: 10px 10px 10px 0;
  border-color: transparent white transparent transparent;
}

/* Fix the circle for containers on the right side */
.right::after {
  left: -13px;
}

/* The actual content */
.content {
  padding: 10px 40px;
  background-color: white;
  position: relative;
  border-radius: 6px;

}

.content:hover {
  transform: translateY(-10px);
  box-shadow: 0 5px 30px rgba(102, 220, 28, 0.1);
  transition: all 2s ease;
  cursor: pointer;
}
</style>