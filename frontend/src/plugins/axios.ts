import axios from 'axios'

const axiosInstance = axios.create({
  baseURL: 'http://127.0.0.1:8000/api', // Replace with your API base URL
  headers: {
    'Content-Type': 'application/json'
  }
})

// Get CSRF token
const getCsrfToken = async () => {
  try {
    await axiosInstance.get('/sanctum/csrf-cookie')
  } catch (error) {
    console.error('Error fetching CSRF token:', error)
  }
}

// Get Categories
const CategoryLists = {
  getCategories() {
    return axiosInstance.get('/category/list')
  }
}

// Get Products
const ProductLists = {
  getProducts() {
    return axiosInstance.get('/products/list')
  },
}


// Add a request interceptor
axiosInstance.interceptors.request.use(
  (config) => {
    // Do something before request is sent
    // For example, add an authentication token
    let token = localStorage.getItem('access_token')
    if (token) {
      config.headers.Authorization = `Bearer ${token}`
    }
    return config
  },
  (error) => {
    // Do something with request error
    return Promise.reject(error)
  }
)

// Add a response interceptor
axiosInstance.interceptors.response.use(
  (response) => response,
  (error) => {
    // Handle error
    if (error.response.status === 401) {
      // Handle unauthorized access, e.g., redirect to login
    }
    return Promise.reject(error)
  }
)

// Call the getCsrfToken function to fetch the CSRF token
getCsrfToken()

export default axiosInstance
export { CategoryLists, ProductLists }