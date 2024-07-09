<template>
  <div class="container">
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-white">
      <div
        class="d-flex align-items-center flex-shrink-8 p-3 link-dark text-decoration-none border-botton"
      >
        <input class="fs-5 fw-semibold" v-model="username" />
      </div>
      <div class="list-group list-group-flush border-bottom scrollarea">
        <div
          class="list-group-item list-group-item-action py-3 th-tight"
          v-for="message in messages"
          :key="message"
        >
          <div class="d-flex w-100 align-items-center justify-content-between">
            <strong class="mb-1">{{ message.username }}</strong>
          </div>
          <div class="col-18-mb-1 small">
            {{ message.message }}
          </div>
        </div>
      </div>
    </div>
    <div
      class="d-flex align-items-center flex-shrink-8 p-3 link-dark text-decoration-none border-top"
    >
      <form @submit.prevent="sendMessage">
        <input class="fs-5 fw-semibold" v-model="message" />
      </form>
    </div>
  </div>
</template>
  

<script>
import { ref } from 'vue'
import Pusher from 'pusher-js'
export default {
  name: 'ShowDetailChat',
  setup() {
    const username = ref('username')
    const messages = ref([])
    const message = ref('')

    Pusher.logToConsole = true

    const pusher = new Pusher('b8c985662168d3c595ee', {
      cluster: 'ap1'
    })

    const channel = pusher.subscribe('chat')
    channel.bind('message', (data) => {
      messages.value.push(data)
    })

    const sendMessage = async () => {
      await fetch('http://127.0.0.1:8000/api/chat/message', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json'
        },
        body: JSON.stringify({
          username: username.value,
          message: message.value
        })
      })
      message.value = ''
    }

    return {
      username,
      messages,
      message,
      sendMessage
    }
  }
}
</script>