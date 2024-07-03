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
      component: () => import('@/views/Web/Auth/LoginView.vue')
    },
    {
      path: '/register',
      name: 'register',
      component: () => import('@/views/Web/Auth/RegisterView.vue')
    },
    {
      path: '/',
      name: 'home',
      component: () => import('@/views/Web/HomeView.vue')
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
      path: '/shop',
      name: 'shopPage',
<<<<<<< HEAD
      component: () => import('@/views/Web/shop/ListProductView.vue')
    },
    {
      path: '/shop/product_vegetable',
      name: 'pageProductvegetable',
      component: () => import('@/views/Web/Product/ProductVegetableView.vue')
=======
      component: () => import('@/views/Web/shop/CategoryView.vue')
>>>>>>> 777b2be33914615818a38de40d534f931d3308cd
    }
  ]
})

router.beforeEach(async (to, from, next) => {
  const publicPages = ['/']
  const authRequired = !publicPages.includes(to.path)
  const store = useAuthStore();
  let value = localStorage.getItem('access_token');
  let token = value.split('"').join('');
  try {
    const { data } = await axiosInstance.get('/me', {
      headers: {
        Authorization: `Bearer ${token}`,
      }
    });
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
    next();

  }
  if (authRequired && !store.isAuthenticated) {
    next('/login')
  } else {
    next()
  }
});

export default { router, simpleAcl }
