import { createRouter, createWebHistory } from 'vue-router'
import axiosInstance from '@/plugins/axios'
import { useAuthStore } from '@/stores/auth-store'
import { createAcl, defineAclRules } from 'vue-simple-acl'

const simpleAcl = createAcl({})
const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/admin/dashboard',
      name: 'dashboard',
      component: () => import('../views/Admin/DashboardView.vue'),
      meta: {
        requiresAuth: true,
        role: 'admin'
      }
    },
    {
      path: '/login',
      name: 'login',
      component: () => import('../views/Web/Auth/LoginView.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('../views/Web/Auth/RegisterView.vue')
    },
    {
      path: '/forgot_password',
      name: 'forgot_password',
      component: () => import('../views/Web/Auth/ForgotPasswordView.vue')
    },
    {
      path: '/reset_password',
      name: 'reset_password',
      component: () => import('../views/Web/Auth/ResetPasswordView.vue')
    },
    {
      path: '/',
      name: 'home',
      component: () => import('../views/Web/HomeView.vue')
    },
    {
      path: '/post',
      name: 'post',
      component: () => import('@/views/Web/Post/ListView.vue')
    },
    {
      path: '/contact_us',
      name: 'contact',
      component: () => import('@/views/Web/ContactView.vue')
    },
    {
      path: '/about_us',
      name: 'about',
      component: () => import('@/views/Web/Post/AboutusView.vue')
    },
    {
      path: '/shop',
      name: 'shopPage',
      component: () => import('@/views/Web/shop/CategoryView.vue')
    },
    {
      path: '/myProducts',
      name: 'myProducts',
      component: () => import('@/views/Web/Product/MyProducts.vue')
    },
    {
      path: '/shop/product_vegetable',
      name: 'pageProductvegetable',
      component: () => import('@/views/Web/Product/ProductVegetableView.vue')
    }
  ]
})

router.beforeEach(async (to, from, next) => {
  const publicPages = ['/', '/shop', '/register', '/login', '/contact_us', '/about_us', '/forgot_password', '/reset_password']
  const authRequired = !publicPages.includes(to.path)
  const store = useAuthStore();
  try {
    const { data } = await axiosInstance.get('/me')
    store.isAuthenticated = true
    store.user = data.data

    store.permissions = data.data.permissions.map((item: any) => item.name)
    store.roles = data.data.roles.map((item: any) => item.name)

    const rules = () =>
      defineAclRules((setRule) => {
        store.permissions.forEach((permission: string) => {
          setRule(permission, () => true)
        })
      })

    simpleAcl.rules = rules()
  } catch (error) {
    /* empty */

  }

  if (authRequired && !store.isAuthenticated) {
    next('/login')
  } else {
    next()
  }
})

export default { router, simpleAcl }
