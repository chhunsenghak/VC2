import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';

export const useProductsStore = defineStore('products', {
  state: () => ({
    products: [] as Array<{ id: number, name: string, frontuser_id: number, image: string, price: string, discount: string, quantity: string, stock_id: number, categorys_id: number}>
  }),
  actions: {
    async fetchProducts() {
      try {
        const response = await axiosInstance.get('/products/list', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        });
        this.products = response.data;
      } catch (error) {
        console.error('Error fetching products:', error);
      }
    }
  }
});
