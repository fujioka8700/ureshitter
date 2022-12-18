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
            class="emotion-wrap--unit card pt-1 pb-0 px-1 u-pointer--cursor"
            :class="{ 'border border-3 border-secondary': emotion === 0 }"
            @click="emotion = 0"
          >
            <img
              :src="LittleHappy"
              alt="少しうれしい顔"
              class="card-img-top bg-secondary bg-opacity-25 rounded-1"
            />
            <div class="card-body p-0">
              <p class="card-text text-center">{{ EMOTION_MESSAGE[0] }}</p>
            </div>
          </div>
          <div
            class="emotion-wrap--unit card pt-1 pb-0 px-1 u-pointer--cursor"
            :class="{ 'border border-3 border-secondary': emotion === 1 }"
            @click="emotion = 1"
          >
            <img
              :src="UsuallyHappy"
              alt="うれしい顔"
              class="card-img-top bg-secondary bg-opacity-25 rounded-1"
            />
            <div class="card-body p-0 position-relative">
              <p class="card-text text-center">{{ EMOTION_MESSAGE[1] }}</p>
            </div>
          </div>
          <div
            class="emotion-wrap--unit card pt-1 pb-0 px-1 u-pointer--cursor"
            :class="{ 'border border-3 border-secondary': emotion === 2 }"
            @click="emotion = 2"
          >
            <img
              :src="VeryHappy"
              alt="すごくうれしい顔"
              class="card-img-top bg-secondary bg-opacity-25 rounded-1"
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
    };
  },
  methods: {
    async postMessage() {
      let post_success_content;

      const response = await axios
        .post('/api/messages', {
          name: this.name,
          emotion: this.emotion,
          message: this.message,
        })
        .then(function (response) {
          post_success_content = response;

          return false;
        })
        .catch(function (error) {
          let errors = {};

          // Laravelから返ってきたバリデーションエラー内容を取り出す
          for (let key in error.response.data.errors) {
            errors[key] = error.response.data.errors[key][0];
          }

          return errors;
        });

      this.showValidationErrors(response);

      this.checkForValidationErrors(response, post_success_content);

      return false;
    },
    showValidationErrors(response) {
      if (Object.keys(response).length !== 0) {
        this.error_messages = response;
      }
    },
    checkForValidationErrors(response, content) {
      if (Object.keys(response).length === 0) {
        this.goToPostSuccessPage(content);
      }
    },
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
