import { defineStore } from 'pinia'
import axiosInstance from '@/plugins/axios'
export const categoryStore = defineStore('categorys', {
  state: () => ({
    categorys: [] as Array<{
      id: number
      name: string
      description: string
    }>
  }),
  actions: {
    async fetchCategorys() {
      try {
        const response = await axiosInstance.get('/category/list', {
          headers: {
            Authorization: `Bearer ${localStorage.getItem('access_token')}`
          }
        })
        this.categorys = response.data
      } catch (error) {
        console.error('Error fetching categorys:', error)
      }
    }
  }
})
