import { createRouter, createWebHistory } from 'vue-router';
import { useStorePagination } from '../stores/pagination';
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
    beforeEnter: (to, from, next) => {
      // メッセージ投稿後、自身の書き込みが、
      // 確認出来るように1ページ目に遷移します。
      if (from.fullPath.match('/success')) {
        const pagination = useStorePagination();
        const { changeStorePage } = pagination;

        changeStorePage(1);
      }

      next();
    },
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
    path: '/:pathMatch(.*)*',
    name: 'notfound',
    component: NotFound,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
