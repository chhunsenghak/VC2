import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
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
    receiverUser: [] as Array<{
      id: number,
      name: string,
      email: string,
      bio: string,
      linkenin: string,
      facebook: string,
      telegram: string,
      password: string,
      phone: string,
      address: string,
      profile: string,
      gender: string,
      shop: number,
      check: number,
      created_at: string,
      updated_at: string,
    }>
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
    }

  }
});
