<script setup>
import LittleHappy from '../../../images/little-happy.svg';
import UsuallyHappy from '../../../images/usually-happy.svg';
import VeryHappy from '../../../images/very-happy.svg';
import { EMOTION_BGCOLOR } from '../../config';
</script>

<template>
  <article class="c-article-item">
    <div class="container">
      <div
        class="pt-2 pb-2 border-bottom d-flex u-pointer--cursor message-height__max"
        :class="{ 'border-end__remove': last }"
        @mouseover="mouseOverAction"
        @mouseleave="mouseLeaveAction"
        @click="goToMessage"
      >
        <img
          :src="imgSrc"
          class="bg-opacity-25 rounded-1 me-2"
          :class="[bgColor, { 'opacity-50': messageMouseOver }]"
          alt=""
        />
        <div>
          <p class="mb-0 text-primary" :class="{ 'text-decoration-underline': messageMouseOver }">
            {{ name }} さん
          </p>
          <span class="writing-time-text">{{ writingTime }}</span>
          <div class="article-message overflow-auto text-break">
            <p>{{ message }}</p>
          </div>
        </div>
      </div>
    </div>
  </article>
</template>

<script>
export default {
  data() {
    return {
      imgSrc: '',
      bgColor: '',
      messageMouseOver: false,
    };
  },
  props: {
    id: {
      type: Number,
      required: true,
    },
    name: {
      type: String,
      required: true,
    },
    emotion: {
      type: Number,
      required: true,
    },
    message: {
      type: String,
      required: true,
    },
    created_at: {
      type: String,
      required: true,
    },
    last: {
      type: Boolean,
      required: true,
    },
  },
  created() {
    this.iconType();
  },
  computed: {
    writingTime() {
      const writingTime = DateTime.fromJSDate(new Date(this.created_at));

      return writingTime.toFormat('yyyy年MM月dd日 HH:mm');
    },
  },
  methods: {
    iconType() {
      switch (this.emotion) {
        case 0:
          this.imgSrc = LittleHappy;
          this.bgColor = EMOTION_BGCOLOR[0];
          break;
        case 1:
          this.imgSrc = UsuallyHappy;
          this.bgColor = EMOTION_BGCOLOR[1];
          break;
        case 2:
          this.imgSrc = VeryHappy;
          this.bgColor = EMOTION_BGCOLOR[2];
          break;
        default:
          break;
      }

      return false;
    },
    mouseOverAction() {
      this.messageMouseOver = true;
    },
    mouseLeaveAction() {
      this.messageMouseOver = false;
    },
    goToMessage() {
      this.$router.push({ name: 'message', params: { id: this.id } });
    },
  },
};
</script>
