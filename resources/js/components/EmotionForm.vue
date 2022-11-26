<script setup>
import LittleHappy from '../../images/little-happy.svg';
import UsuallyHappy from '../../images/usually-happy.svg';
import VeryHappy from '../../images/very-happy.svg';
</script>

<template>
  <section class="c-emotion-section">
    <div class="container">
      <form @submit.prevent="postMessage()">
        <ul class="list-group" v-if="error_messages">
          <li class="text-danger" v-for="error in error_messages" :key="error">
            {{ error }}
          </li>
        </ul>
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
            class="emotion-wrap--unit card pt-1 pb-0 px-1"
            :class="{ 'border border-3 border-secondary': emotion === 0 }"
            @click="emotion = 0"
          >
            <img
              :src="LittleHappy"
              alt="少しうれしい画像"
              class="card-img-top bg-secondary bg-opacity-25 rounded-1"
            />
            <div class="card-body p-0">
              <p class="card-text text-center">少しうれしい</p>
            </div>
          </div>
          <div
            class="emotion-wrap--unit card pt-1 pb-0 px-1"
            :class="{ 'border border-3 border-secondary': emotion === 1 }"
            @click="emotion = 1"
          >
            <img
              :src="UsuallyHappy"
              alt="うれしい画像"
              class="card-img-top bg-secondary bg-opacity-25 rounded-1"
            />
            <div class="card-body p-0 position-relative">
              <p class="card-text text-center">うれしい</p>
            </div>
          </div>
          <div
            class="emotion-wrap--unit card pt-1 pb-0 px-1"
            :class="{ 'border border-3 border-secondary': emotion === 2 }"
            @click="emotion = 2"
          >
            <img
              :src="VeryHappy"
              alt="すごくうれしい画像"
              class="card-img-top bg-secondary bg-opacity-25 rounded-1"
            />
            <div class="card-body p-0">
              <p class="card-text text-center">すごくうれしい</p>
            </div>
          </div>
        </div>
        <!-- End of happiness -->

        <div class="mt-3">
          <label for="Textarea" class="form-label">うれしかったこと</label>
          <textarea
            class="form-control"
            id="Textarea"
            rows="3"
            placeholder="例 : 10円拾ったよ"
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
      message: 'メッセージ',
      error_messages: {},
    };
  },
  methods: {
    async postMessage() {
      const res = await axios
        .post('/api/messages', {
          name: this.name,
          emotion: this.emotion,
          message: this.message,
        })
        .then(function (response) {
          alert('投稿しました。');
          return false;
        })
        .catch(function (error) {
          let errors = {};

          for (let key in error.response.data.errors) {
            errors[key] = error.response.data.errors[key][0];
          }

          return errors;
        });

      // バリデーションエラー内容を削除する
      if (this.error_messages.name) {
        delete this.error_messages.name;
      }

      // バリデーションエラー内容を表示する
      if (res.hasOwnProperty('name')) {
        this.error_messages = res;
      }
    },
  },
};
</script>
