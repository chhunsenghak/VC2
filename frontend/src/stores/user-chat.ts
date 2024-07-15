import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
import { string } from 'yup';
export const userChatStore = defineStore('users', {
  state: () => ({
    users: [] as Array<{
      sender_id: number,
      receiver_id: [],
      frontuser_id: number,
      price: string,
      image: string,
      discount: string,
      quantity: string,
      stock_id: number,
      categorys_id: number
    }>,
    receiverUser: [],
    chat: [] as Array<{
      status: true,
      data: string
    }>,
  }),
  actions: {
    async fetchChatUser() {
      try {
        const response = await axiosInstance.get('chat/getUser', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          },
        });
        this.users = response.data;
      } catch (error) {
        console.error('Error fetching products:', error);
      }
    },
    async fetchReceiverUser(id) {
      try {
        const data = await axiosInstance.get(`/chat/getConversation/${id}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          },
        })
        this.receiverUser = data.data;
      } catch (e) {
        console.error('Error fetching receiver user:', e);
      }
    },
    async removeAllMessages(id) {
      try {
        const data = await axiosInstance.delete(`chat/remove/all/messages/${id}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          },
        })
      } catch (e) {
        console.log("Error fetching delete all conversation:", e)
      }
    },
    async deleteUserChat(id) {
      try {
        const data = await axiosInstance.delete(`chat/remove/user/${id}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          },
        })
      } catch (e) {
        console.log("Error fetching delete all conversation:", e)
      }
    },
    async receiveMessage(id) {
      try {
        const data = await axiosInstance.get(`chat/recieveMessage/${id}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          },
        })
        this.receiverUser = data.data
      } catch (e) {
        console.log("Error fetching delete all conversation:", e)
      }
    },
    async sendText(message) {
      try {
        const response = await axiosInstance.post("/chat/sendText", message, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          },
        })
      } catch (e) {
        console.log("Error send :", e)
      }
    }
  }
});
