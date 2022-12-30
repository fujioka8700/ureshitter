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

      <div class="mt-4 pb-2 d-flex justify-content-around">
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
import { EMOTION_MESSAGE, EMOTION_BGCOLOR, NOTFOUND } from '../../config';
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
    /**
     * メッセージを投稿した時間です。
     * @return {string} 「年月日 時分」に変換しています。
     */
    writingTime() {
      const writingTime = DateTime.fromJSDate(new Date(this.created_at));

      return writingTime.toFormat('yyyy年MM月dd日 HH:mm');
    },
    /**
     * ツイートする文章を作成します。
     * @return {string}
     */
    twitterText() {
      return `【${this.emotionMessage}】${this.message} ${this.name}`;
    },
    /**
     * 表示しているページのアドレスです。
     * @return {string}
     */
    originURL() {
      return window.location.href;
    },
  },
  created() {
    this.receiveNumbersOnly(this.id);

    this.getMessage().then((result) => {
      this.iconType();

      // 非同期の処理が完了し、
      // ツイートボタンのコンポーネントに渡すデータが揃ってから、
      // ツイートボタンを表示するようにしています。
      this.ready = true;
    });
  },
  methods: {
    /**
     * メッセージを1つ取得します。
     */
    async getMessage() {
      const result = await axios.get(`/api/messages/${this.id}`).catch((response) => {
        const error = response.response;

        // リクエストされたメッセージが無ければ、NotFound へ遷移します。
        if (error.status === NOTFOUND) {
          this.$router.push({ name: 'notfound' });
        }
      });

      const message = result.data;

      this.name = message.name;
      this.message = message.message;
      this.emotion = message.emotion;
      this.created_at = message.created_at;
    },
    /**
     * 表示する表情アイコン、背景色、感情メッセージを決定します。
     */
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
    },
    /**
     * メッセージを削除するか、確認ダイアログを表示します。
     */
    async deleteMessage() {
      const inputPassword = window.prompt('削除キーを入力してください。', '');

      const response = await axios.delete(`/api/messages/${this.id}`, {
        params: {
          password: inputPassword,
        },
      });

      this.transitionIfDeleted(response);
    },
    /**
     * メッセージが削除できていれば、TOP画面へ遷移します。
     * @param {Object} record 削除できたレコード数です。
     */
    transitionIfDeleted(record) {
      if (record.data.deleteCount === 0) {
        alert('削除できませんでした。');
      }

      if (record.data.deleteCount === 1) {
        alert('削除しました。');
        this.$router.push({ name: 'home' });
      }
    },
    /**
     * パスパラメーターは数字のみ受け取ります。
     * 数字以外が混ざっていれば、NotFound へ遷移します。
     * @param {number} id メッセージIDです。
     */
    receiveNumbersOnly(id) {
      const pattern = /^[0-9]*$/;
      const messageId = id.match(pattern);

      if (messageId === null) {
        this.$router.push({ name: 'notfound' });
      }
    },
  },
};
</script>
