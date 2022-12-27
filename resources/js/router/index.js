import { createRouter, createWebHistory } from 'vue-router';
import TheHome from '../components/pages/TheHome.vue';
import TheAbout from '../components/pages/TheAbout.vue';
import TheSuccess from '../components/pages/TheSuccess.vue';
import NotFound from '../components/pages/NotFound.vue';
import MessageItem from '../components/pages/MessageItem.vue';

const routes = [
  {
    path: '/',
    name: 'home',
    component: TheHome,
  },
  {
    path: '/about',
    name: 'about',
    component: TheAbout,
  },
  {
    path: '/success',
    name: 'success',
    component: TheSuccess,
  },
  {
    path: '/message/:id',
    name: 'message',
    component: MessageItem,
    props: true,
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
