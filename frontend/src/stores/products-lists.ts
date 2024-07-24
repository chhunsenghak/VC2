import { defineStore } from 'pinia'
import axiosInstance from '@/plugins/axios'

export const useProductsStore = defineStore('products', {
  state: () => ({
    products: [] as Array<{
      id: number
      name: string
      frontuser_id: number
      image: string
      price: string
      discount: string
      quantity: string
      stock_id: any
      categorys_id: number
    }>,
    product: [] as Array<{
      id: number
      name: string
      price: number
      description: string
      image: string
      categorys_id: number
      stock_type: string
    }>
  }),
  actions: {
    async fetchProducts() {
      try {
        const response = await axiosInstance.get('/products/list', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        })
        this.products = response.data
      } catch (error) {
        console.error('Error fetching products:', error)
      }
    },
    async fetchCategory(id: number) {
      try {
        const response = await axiosInstance.get(`/category/show/${id}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        })
        this.products = response.data
      } catch (error) {
        console.error('Error fetching products:', error)
      }
    },
    async fetchProductDetail(id) {
      try {
        const response = await axiosInstance.get(`/products/show/${id}`, {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        })
        this.product = response.data
      } catch (error) {
        console.error('Error fetching products:', error)
      }
    }
  }
})
