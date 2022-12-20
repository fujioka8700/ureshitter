<template>
  <div class="p-message-item main-background">
    <div class="container">
      <div class="text-center pt-4 pb-4">
        <span>{{ name }} さんの、投稿です。</span>
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
      imgSrc: '',
      bgColor: '',
    };
  },
  computed: {
    twitterText() {
      return `【${this.emotionMessage}】${this.message}+-+${this.name}`;
    },
    originURL() {
      const uri = new URL(window.location.href);

      return uri.origin;
    },
  },
  created() {
    // デザインを作成するため、仮のデータを作成する。
    this.name = '名無し';
    this.message = '晴れた良い天気でよかったです。';
    this.emotion = 2;

    this.iconType();
  },
  methods: {
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
  },
};
</script>
