<script setup>
import LittleHappy from '../../../images/little-happy.svg';
import UsuallyHappy from '../../../images/usually-happy.svg';
import VeryHappy from '../../../images/very-happy.svg';
import { EMOTION_MESSAGE } from '../../config';
</script>

<template>
  <section class="c-emotion-section">
    <div class="container">
      <form @submit.prevent="postMessage()">
        <div v-if="error_messages">
          <span class="text-danger">{{ error_messages.name }}</span>
        </div>
        <div class="d-flex align-items-center">
          <label for="Name" class="text-nowrap">名前</label>
          <input
            type="text"
            name="name"
            class="form-control ms-1"
            id="Name"
            placeholder="名無し"
            v-model="name"
          />
        </div>
        <!-- End of name input -->

        <div class="emotion-wrap mt-3 d-flex justify-content-between">
          <div
            class="card pt-1 pb-0 px-1 u-pointer--cursor u-mouse-hover-color"
            :class="{ 'border border-3 border-secondary': emotion === 0 }"
            @click="emotion = 0"
          >
            <img
              :src="LittleHappy"
              alt="少しうれしい顔"
              class="card-img-top u-bg-little-happy bg-opacity-25 rounded-1"
            />
            <div class="card-body p-0">
              <p class="card-text text-center">{{ EMOTION_MESSAGE[0] }}</p>
            </div>
          </div>
          <div
            class="card pt-1 pb-0 px-1 u-pointer--cursor u-mouse-hover-color"
            :class="{ 'border border-3 border-secondary': emotion === 1 }"
            @click="emotion = 1"
          >
            <img
              :src="UsuallyHappy"
              alt="うれしい顔"
              class="card-img-top u-bg-usually-happy bg-opacity-25 rounded-1"
            />
            <div class="card-body p-0 position-relative">
              <p class="card-text text-center">{{ EMOTION_MESSAGE[1] }}</p>
            </div>
          </div>
          <div
            class="card pt-1 pb-0 px-1 u-pointer--cursor u-mouse-hover-color"
            :class="{ 'border border-3 border-secondary': emotion === 2 }"
            @click="emotion = 2"
          >
            <img
              :src="VeryHappy"
              alt="すごくうれしい顔"
              class="card-img-top u-bg-very-happy bg-opacity-25 rounded-1"
            />
            <div class="card-body p-0">
              <p class="card-text text-center">{{ EMOTION_MESSAGE[2] }}</p>
            </div>
          </div>
        </div>
        <!-- End of happiness -->

        <div class="mt-3">
          <div v-if="error_messages">
            <span class="text-danger">{{ error_messages.message }}</span>
          </div>
          <label for="Textarea" class="form-label">うれしかったこと</label>
          <textarea
            class="form-control"
            id="Textarea"
            rows="3"
            placeholder="例 : かわいい猫を見かけたよ"
            v-model="message"
          ></textarea>
        </div>
        <!-- End of textarea -->

        <div class="mb-3 mt-3 password-area--body">
          <label for="InputPassword" class="form-label me-2">削除キー</label>
          <input
            type="password"
            class="form-control password__input"
            id="InputPassword"
            placeholder="1234"
            v-model="password"
          />
        </div>
        <!-- End of password area -->

        <div class="mt-3 text-center border-bottom pb-3">
          <button type="submit" class="btn btn-primary">投稿する</button>
        </div>
        <!-- End of submit button -->
      </form>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      emotion: 1,
      message: '',
      error_messages: {},
      password: '',
    };
  },
  methods: {
    /**
     * メッセージを投稿します。
     */
    async postMessage() {
      /**
       * メッセージ投稿成功時、メッセージを格納します。
       * @type {Object}
       */
      let post_success_content;

      const response = await axios
        .post('/api/messages', {
          name: this.name,
          emotion: this.emotion,
          message: this.message,
          password: this.password,
        })
        .then(function (response) {
          post_success_content = response;

          return false;
        })
        .catch(function (error) {
          /**
           * バリデーションエラー内容を格納します。
           * @type {Object}
           */
          let errors = {};

          // Laravelから返ってきたバリデーションエラー内容を取り出します。
          for (let key in error.response.data.errors) {
            errors[key] = error.response.data.errors[key][0];
          }

          return errors;
        });

      this.showValidationErrors(response);

      this.checkForValidationErrors(response, post_success_content);
    },
    /**
     * メッセージ投稿後のバリデーションエラーを表示します。
     * @param {Object} errors メッセージ投稿時のバリデーションエラーです。
     */
    showValidationErrors(errors) {
      if (Object.keys(errors).length !== 0) {
        this.error_messages = errors;
      }
    },
    /**
     * バリデーションエラーの有無をチェックします。
     * @param {Object} errors メッセージ投稿時のバリデーションエラーです。
     * @param {Object} content メッセージ投稿成功時のメッセージです。
     */
    checkForValidationErrors(errors, content) {
      if (Object.keys(errors).length === 0) {
        this.goToPostSuccessPage(content);
      }
    },
    /**
     * 投稿成功ページへ遷移します。
     * @param {Object} content メッセージ投稿成功時のメッセージです。
     */
    goToPostSuccessPage(content) {
      this.$router.push({
        name: 'success',
        query: {
          name: content.data.name,
          message: content.data.message,
          emotion: content.data.emotion,
          status: content.status,
        },
      });
    },
  },
};
</script>
