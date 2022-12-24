import './bootstrap';

import { DateTime } from 'luxon';
window.DateTime = DateTime;

import { createApp } from 'vue';
import App from './App.vue';
import router from './router/index.js';

const app = createApp(App);

app.use(router);
app.mount('#app');
