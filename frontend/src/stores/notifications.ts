import { defineStore } from 'pinia'
import axiosInstance from '@/plugins/axios'
export const notificationStore = defineStore('notification', {
    state: () => ({
        notifications: [] as Array<{
            id: number,
            receiver_id: number,
            title: string,
            description: string,
            type: string,
            created_at: any
        }>
    }),
    actions: {
        async fetchNotifications() {
            try {
                const response = await axiosInstance.get('/notifications/user', {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('access_token')}`
                    }
                })
                this.notifications = response.data
            } catch (error) {
                console.error('Error fetching categorys:', error)
            }
        }
    }
})
