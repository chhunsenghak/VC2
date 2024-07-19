import { defineStore } from 'pinia';
import axiosInstance from '@/plugins/axios';
export const postStore = defineStore('post', {
    state: () => ({
        post: [] as Array<{
            id: number,
            name: string,
            description: string,
            created_at: Date,
        }>
    }),
    actions: {
        async fetchPost(id: number) {
            try {
                const response = await axiosInstance.get(`/post/show/${id}`, {
                    headers: {
                        Authorization: `Bearer ${localStorage.getItem('access_token')}`
                    },
                });
                this.post = response.data;
            } catch (error) {
                console.error('Error fetching products:', error);
            }
        }
    }
});