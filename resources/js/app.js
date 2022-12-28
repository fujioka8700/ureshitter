import './bootstrap';

import { createApp } from 'vue';
import { createPinia } from 'pinia';
import router from './router';
import App from './App.vue';

const pinia = createPinia();

/**
 * store 全ての、値をリセットする。
 */
pinia.use(({ store }) => {
  const initialState = JSON.parse(JSON.stringify(store.$state));

  store.$reset = () => {
    store.$state = JSON.parse(JSON.stringify(initialState));
  };
});

const app = createApp(App);

app.use(pinia);
app.use(router);
app.mount('#app');

import { hamburger } from './util';
hamburger();
