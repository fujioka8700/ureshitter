import _ from 'lodash';
window._ = _;

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

import { getCookieValue } from './util';
import axios from 'axios';
window.axios = axios;

// Ajaxリクエストであることを示すヘッダーを付与します。
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.axios.interceptors.request.use((config) => {
  // クッキーからトークンを取り出してヘッダーに添付します。
  config.headers['X-XSRF-TOKEN'] = getCookieValue('XSRF-TOKEN');

  return config;
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// import Pusher from 'pusher-js';
// window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: import.meta.env.VITE_PUSHER_APP_KEY,
//     wsHost: import.meta.env.VITE_PUSHER_HOST ? import.meta.env.VITE_PUSHER_HOST : `ws-${import.meta.env.VITE_PUSHER_APP_CLUSTER}.pusher.com`,
//     wsPort: import.meta.env.VITE_PUSHER_PORT ?? 80,
//     wssPort: import.meta.env.VITE_PUSHER_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_PUSHER_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

/**
 * Bootstrap5 のリファレンスはこちらです。
 * @see https://bootstrap-guide.com/
 */
import * as bootstrap from 'bootstrap';

/**
 * 日付オブジェクトを取得後、日付の加工にluxonを使用します。
 * (jsonにはISO8601形式で送られてきます。)
 * @see https://moment.github.io/luxon/
 */
import { DateTime } from 'luxon';
window.DateTime = DateTime;
