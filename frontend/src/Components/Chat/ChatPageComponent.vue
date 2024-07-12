<template>
  <div class="container">
    <div class="chat-container" style="margin-top: 6%">
      <div class="messages-info">
        <!-- #### -->
        <div class="chat-room">
          <div class="type-info">
            <div id="mySidepanel" class="sidepanel" :style="{ width: sidepanelWidth }">
              <a href="javascript:void(0)" class="closebtn" @click="closeNav">×</a>
              <a href="/shop">Back Product</a>
            </div>
            <button class="openbtn" @click="openNav">☰</button>
            <div class="search-wrapper">
              <input type="search" placeholder="Search..." class="search-input" />
              <i class="material-icons search-icon">search</i>
            </div>
          </div>
          <div class="messages-container">
            <div class="messages-content m-2" ref="messagesContainer">
              <h4>Chat Messages</h4>
              <div class="content-user">
                <img src="../../assets/images/person_1.jpg" alt="Avatar" />
                <span class="time-message">11:00 AM</span>
                <div class="message-user">
                  <h1 style="font-size: 20px">Poeun Sokunthea</h1>
                  <p>Cambodia is currently looking for talented</p>
                </div>
              </div>
              <div class="content-user">
                <img src="../../assets/images/person_2.jpg" alt="Avatar" />
                <span class="time-message">11:00 AM</span>
                <div class="message-user">
                  <h1 style="font-size: 20px">Poeun Sokunthea</h1>
                  <p>Cambodia is currently looking for talented</p>
                </div>
              </div>
              <div class="content-user">
                <img src="../../assets/images/person_3.jpg" alt="Avatar" />
                <span class="time-message">11:00 AM</span>
                <div class="message-user">
                  <h1 style="font-size: 20px">Poeun Sokunthea</h1>
                  <p>Cambodia is currently looking for talented</p>
                </div>
              </div>
              <div class="content-user">
                <img src="../../assets/images/person_4.jpg" alt="Avatar" />
                <span class="time-message">11:00 AM</span>
                <div class="message-user">
                  <h1 style="font-size: 20px">Poeun Sokunthea</h1>
                  <p>Cambodia is currently looking for talented</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- #### -->
        <div class="user-info">
          <div class="user-name ml-5">Poeun Sokunthea</div>
          <!-- start message -->
          <div class="messages">
            <div class="container-right d-flex flex-row-reverse">
              <img src="../../assets/images/person_4.jpg" alt="Avatar" />
              <div class="message-item">
                <div class="message-title">សួស្តីបង</div>
                <span class="time-right">10:00 AM</span>
              </div>
            </div>
            <div class="container-left">
              <img src="../../assets/images/person_3.jpg" alt="Avatar" />
              <div class="message-item">
                <div class="message-title">បាទ​ សួស្តីអូន</div>
                <span class="time-left">11:01 AM</span>
              </div>
            </div>
            <div class="container-right d-flex flex-row-reverse">
              <img src="../../assets/images/person_4.jpg" alt="Avatar" />
              <div class="message-item">
                <div class="message-title">សុំសួរពីតម្លៃទំនិញបងបន្តិចបានអត់បង</div>
                <span class="time-right">10:00 AM</span>
              </div>
            </div>
            <div class="container-left">
              <img src="../../assets/images/person_3.jpg" alt="Avatar" />
              <div class="message-item">
                <div class="message-title">បាទ សួរបានអូន</div>
                <span class="time-left">11:01 AM</span>
              </div>
            </div>
          </div>
          <!-- end message -->

          <!-- start chat -->
          <div class="chat-box">
            <div class="chat-input">
              <label class="btn btn-light d-flex align-items-center btn-file position-relative">
                <span class="material-icons"> insert_photo </span>
                <input type="file" accept="image/*" style="display: none" />
              </label>
              <input type="text" placeholder="Type a message..." />
              <button
                class="btn btn-info d-flex align-items-center position-relative"
                @click="sendMessage"
              >
                <span class="material-icons"> send </span>
              </button>
            </div>
          </div>
          <!-- end chat -->
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: 'ChatPageComponent',
  data() {
    return {
      sidepanelWidth: '0'
    }
  },
  methods: {
    openNav() {
      this.sidepanelWidth = '250px'
    },
    closeNav() {
      this.sidepanelWidth = '0'
    }
  }
}
</script>

<style scoped>
.chat-container {
  height: 100vh;
  width: 100%;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
}

.messages-info {
  display: flex;
  height: 90vh;
}

/* =============================================== */
.chat-room {
  flex: 0.5;
}
.type-info {
  flex: 0.2;
  padding: 10px;
  color: white;
  display: flex;
  align-items: center;
  justify-content: space-between;
  margin-bottom: 5%;
}
.search-wrapper {
  position: relative;
}

.search-input {
  padding: 5px 30px;
  border: 1px solid #ddd;
  border-radius: 25px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
  /* transition: all 0.3s ease; */
  outline: none;
  cursor: pointer;
}

.search-icon {
  position: absolute;
  top: 50%;
  right: 10px;
  transform: translateY(-50%);
  font-size: 1.2rem;
  color: #aaa;
  transition: color 0.3s ease;
}

.sidepanel {
  height: 25%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #10aa20;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
  margin-top: 5%;
  border-radius: 0px 10px 10px 0px;
}

.sidepanel a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidepanel a:hover {
  color: #f1f1f1;
}

.sidepanel .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #098947;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #18910d;
}

.content-user {
  border: 2px solid #f4f3f3;
  background-color: #f5f4f4;
  border-radius: 5px;
  padding: 5px;
  margin: 10px 0;
}

.content-user img {
  float: left;
  max-width: 60px;
  margin-right: 20px;
  border-radius: 50%;
}

.time-message {
  float: right;
  color: #999;
}

/* ============================================== */
.user-info {
  flex: 1;
  height: auto;
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}

.container-right,
.container-left {
  display: flex;
}

.message-item {
  padding: 8px;
  margin: 2px 10px;
}

.message-item::after {
  content: '';
  clear: both;
  display: table;
}

.container-left img {
  float: left;
  max-width: 40px;
  max-height: 40px;
  margin-left: 15px;
  border-radius: 50%;
}

.container-right img {
  float: right;
  max-width: 40px;
  max-height: 40px;
  margin-right: 20px;
  border-radius: 50%;
}

.time-right {
  float: right;
  color: #aaa;
  font-size: 12px;
}

.time-left {
  float: left;
  color: #999;
  font-size: 12px;
}

.chat-box {
  border-top: 2px solid #dedede;
  padding: 20px;
  margin-top: 4.2rem;
}

.chat-input input {
  width: 80.5%;
  padding: 10px 8px;
  box-sizing: border-box;
  border-radius: 6px;
  border: none;
  outline: none;
  resize: none;
}

.chat-input {
  display: flex;
  align-items: center;
  justify-content: space-evenly;
}

.user-name {
  font-size: 20px;
  margin-bottom: 10px;
  font-weight: bold;
  padding: 10px;
  border-bottom: 2px solid #dedede;
  /* background-color: #f1f1f1; */
}

/* ================== */
</style>
