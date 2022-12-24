<template>
  <div class="p-message-item main-background">
    <div class="container">
      <div class="text-center pt-4 pb-4">
        <span>{{ name }} さんの、投稿です。</span>
      </div>
      <div class="mb-2 text-end writing-time-text__secondary">
        {{ writingTime }}
      </div>
      <MessageCard
        :imgSrc="imgSrc"
        :bgColor="bgColor"
        :emotionMessage="emotionMessage"
        :message="message"
        :name="name"
      />
      <!-- End of post content -->

      <div class="mt-4 d-flex justify-content-around">
        <div>
          <TweetButton :twitterText="twitterText" :originURL="originURL" v-if="ready" />
          <div class="mt-5">
            <button type="button" class="btn btn-light border" @click="deleteMessage">
              削除する
            </button>
          </div>
        </div>
        <TopButton />
      </div>
      <!-- End of button content -->
    </div>
  </div>
</template>

<script setup>
import LittleHappy from '../../../images/little-happy.svg';
import UsuallyHappy from '../../../images/usually-happy.svg';
import VeryHappy from '../../../images/very-happy.svg';
import { EMOTION_MESSAGE, EMOTION_BGCOLOR } from '../../config';
</script>

<script>
import MessageCard from '../modules/MessageCard.vue';
import TweetButton from '../modules/TweetButton.vue';
import TopButton from '../modules/TopButton.vue';

export default {
  components: {
    MessageCard,
    TweetButton,
    TopButton,
  },
  props: {
    id: {
      type: String,
      required: true,
    },
  },
  data() {
    return {
      name: '',
      message: '',
      emotionMessage: '',
      emotion: null,
      created_at: '',
      imgSrc: '',
      bgColor: '',
      ready: false,
    };
  },
  computed: {
    writingTime() {
      const writingTime = DateTime.fromJSDate(new Date(this.created_at));

      return writingTime.toFormat('yyyy年MM月dd日 HH:mm');
    },
    twitterText() {
      return `【${this.emotionMessage}】${this.message} ${this.name}`;
    },
    originURL() {
      return window.location.href;
    },
  },
  created() {
    this.getMessage().then((result) => {
      this.iconType();

      // 非同期の処理が完了し、
      // ツイートボタンのコンポーネントに渡すデータが揃ってから、
      // ツイートボタンを表示するようにしている。
      this.ready = true;
    });
  },
  methods: {
    async getMessage() {
      const result = await axios.get(`/api/messages/${this.id}`);
      const message = result.data;

      this.name = message.name;
      this.message = message.message;
      this.emotion = message.emotion;
      this.created_at = message.created_at;

      return false;
    },
    iconType() {
      switch (this.emotion) {
        case 0:
          this.imgSrc = LittleHappy;
          this.bgColor = EMOTION_BGCOLOR[0];
          this.emotionMessage = EMOTION_MESSAGE[0];
          break;
        case 1:
          this.imgSrc = UsuallyHappy;
          this.bgColor = EMOTION_BGCOLOR[1];
          this.emotionMessage = EMOTION_MESSAGE[1];
          break;
        case 2:
          this.imgSrc = VeryHappy;
          this.bgColor = EMOTION_BGCOLOR[2];
          this.emotionMessage = EMOTION_MESSAGE[2];
          break;
        default:
          break;
      }

      return false;
    },
    async deleteMessage() {
      const inputPassword = window.prompt('削除キーを入力してください。', '');

      const response = await axios.delete(`/api/messages/${this.id}`, {
        params: {
          password: inputPassword,
        },
      });

      this.transitionIfDeleted(response);
    },
    transitionIfDeleted(confirmResponse) {
      if (confirmResponse.data.deleteCount === 0) {
        alert('削除できませんでした。');
        return false;
      }

      if (confirmResponse.data.deleteCount === 1) {
        alert('削除しました。');
        this.$router.push({ name: 'home' });
      }

      return true;
    },
  },
};
</script>
