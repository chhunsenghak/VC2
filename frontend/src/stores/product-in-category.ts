import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
export const categoryProStore = defineStore('products', {
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
    async fetchCategory(id) {
      try {
        const response = await axiosInstance.get(`/category/show/${id}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          },
        });
        this.products = response.data.products;
      } catch (error) {
        console.error('Error fetching products:', error);
      }
    }
  }
});
