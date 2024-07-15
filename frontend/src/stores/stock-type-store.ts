import { defineStore } from 'pinia'
import axiosInstance from '@/plugins/axios'
export const stockStore = defineStore('stock', {
  state: () => ({
    stocks: [] as Array<{
      id: number
      name: string
      limit_quantity: number
    }>
  }),
  actions: {
    async fetchStocks() {
      try {
        const response = await axiosInstance.get('stocks/list', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        })
        this.stocks = response.data
      } catch (error) {
        console.error('Error fetching stocks:', error)
      }
    }
  }
})
