<template>
  <div class="container">
    
  </div>
</template>

<script>
import { useAuthStore } from '@/stores/auth-store'
export default {
  props: ["userChat"],
  data() {
    return {
      user_id: "",
      store: useAuthStore(),
    }
  },
  methods: {
    getFormattedTime(timestamp) {
      const daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

      const currentDate = new Date();
      const inputDate = new Date(timestamp);

      // Get components for current date
      const currentDay = currentDate.getDate();
      const currentMonth = currentDate.getMonth();
      const currentYear = currentDate.getFullYear();

      // Get components for input date
      const inputDay = inputDate.getDate();
      const inputMonth = inputDate.getMonth();
      const inputYear = inputDate.getFullYear();

      // Compare date parts
      if (currentYear === inputYear && currentMonth === inputMonth && currentDay === inputDay) {
        // Today: Show only time
        const hours = inputDate.getHours();
        const minutes = inputDate.getMinutes().toString().padStart(2, '0');
        const amPm = hours >= 12 ? 'PM' : 'AM';
        const formattedHours = hours % 12 || 12;
        return `${formattedHours}:${minutes} ${amPm}`;
      } else if (currentYear === inputYear && currentMonth === inputMonth && currentDay - inputDay === 1) {
        // Yesterday: Show 'Yesterday'
        return 'Yesterday';
      } else if (currentYear === inputYear) {
        // Same year: Show day and month
        const dayOfMonth = inputDate.getDate();
        const month = inputDate.toLocaleString('default', { month: 'long' });
        return `${dayOfMonth} ${month}`;
      } else {
        // Last year or earlier: Show full date
        const dayOfWeek = daysOfWeek[inputDate.getDay()];
        const dayOfMonth = inputDate.getDate();
        const month = inputDate.toLocaleString('default', { month: 'long' });
        const year = inputDate.getFullYear();
        return `${dayOfWeek}, ${month} ${dayOfMonth}, ${year}`;
      }
    },
    chatDetail(id) {
      this.$emit('reciever_id', id);
    },

    receiverDetail(id) {
      this.$emit('sender_id', id);
    }
  }
}
</script>

<style>
.hover-bg {
  transition: background-color 0.3s ease;
  /* Smooth transition for background color change */
}

.hover-bg:hover {
  background-color: #f6f6f6;
  /* New background color on hover */
}

.col-4 {
  /* Ensure scrollbars are visible only when needed */
  scrollbar-width: thin;
  scrollbar-color: #ffffff #ffffff;
  /* Color of the thumb and track */
  overflow-y: auto;
}

/* WebKit Browsers (Chrome, Safari) */
.col-4::-webkit-scrollbar {
  width: 5px;
  /* Adjust width as needed */
  height: 5px;
  /* Adjust height as needed */
}

.col-4::-webkit-scrollbar-thumb {
  background-color: #ffffff;
  /* Color of the thumb */
  border-radius: 5px;
  /* Rounded corners */
}

.col-4::-webkit-scrollbar-track {
  background-color: #f0f0f0;
  /* Color of the track */
}
</style>