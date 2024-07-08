import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
export const userStore = defineStore('products', {
  state: () => ({
    products: [] as Array<{
      id: number,
      name: string,
      description: string,
      frontuser_id: number,
      price: string,
      image: string,
      discount: string,
      quantity: string,
      stock_id: number,
      categorys_id: number
    }>
  }),
  actions: {
    async fetchUser(id) {
      try {
        const response = await axiosInstance.get(`/products/user/list/${id}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          },
        });
        this.products = response.data;
      } catch (error) {
        console.error('Error fetching products:', error);
      }
    }
  }
});
