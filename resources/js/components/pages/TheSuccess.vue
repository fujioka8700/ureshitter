<script setup>
import LittleHappy from '../../../images/little-happy.svg';
import UsuallyHappy from '../../../images/usually-happy.svg';
import VeryHappy from '../../../images/very-happy.svg';
import { CREATED, EMOTION_MESSAGE, EMOTION_BGCOLOR } from '../../config';
</script>

<template>
  <div class="p-thesuccess main-background" id="p-thesuccess">
    <div class="container">
      <div class="text-center pt-4 pb-4">
        <span>投稿できました。</span>
      </div>
      <MessageCard
        :imgSrc="imgSrc"
        :bgColor="bgColor"
        :emotionMessage="emotionMessage"
        :message="message"
        :name="name"
      />
      <div class="mt-4 d-flex justify-content-around">
        <TweetButton :twitterText="twitterText" :originURL="originURL" />
        <TopButton />
      </div>
    </div>
  </div>
</template>

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
  data() {
    return {
      name: '',
      message: '',
      emotionMessage: '',
      emotion: null,
      imgSrc: '',
      bgColor: '',
    };
  },
  created() {
    this.goToNotfound();

    this.savePostData();

    this.iconType();
  },
  computed: {
    /**
     * ツイートする文章を作成します。
     * @return {string}
     */
    twitterText() {
      return `【${this.emotionMessage}】${this.message} ${this.name}`;
    },
    /**
     * TOPページのアドレスです。
     * @return {string}
     */
    originURL() {
      const uri = new URL(window.location.href);

      return uri.origin;
    },
  },
  methods: {
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
     * クエリパラメーターが不正なら、NotFoundへ遷移します。
     */
    goToNotfound() {
      const status = parseInt(this.$route.query.status);

      if (status !== CREATED) {
        this.$router.push({ path: 'notfound' });
      }
    },
    /**
     * 投稿が成功したメッセージを表示します。
     */
    savePostData() {
      this.name = this.$route.query.name;
      this.message = this.$route.query.message;
      this.emotion = parseInt(this.$route.query.emotion);
    },
  },
};
</script>
