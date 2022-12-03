import { createRouter, createWebHistory } from 'vue-router';
import TheHome from '../components/pages/TheHome.vue';
import TheSuccess from '../components/TheSuccess.vue';
import NotFound from '../components/pages/NotFound.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: TheHome,
  },
  {
    path: '/success',
    name: 'success',
    component: TheSuccess,
  },
  {
    path: '/:catchAll(.*)',
    component: NotFound,
  },
];

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
});

export default router;
