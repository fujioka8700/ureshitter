<script setup>
import LittleHappy from '../../../images/little-happy.svg';
import UsuallyHappy from '../../../images/usually-happy.svg';
import VeryHappy from '../../../images/very-happy.svg';
</script>

<template>
  <article class="c-article">
    <div class="container">
      <div class="article-item mt-3 d-flex">
        <img :src="imgSrc" class="bg-opacity-25 rounded-1 me-2" :class="bgColor" alt="" />
        <div>
          <p class="mb-0">{{ name }} さん</p>
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
    };
  },
  props: {
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
  },
  created() {
    this.iconType();
  },
  methods: {
    iconType() {
      switch (this.emotion) {
        case 0:
          this.imgSrc = LittleHappy;
          this.bgColor = 'u-bg-little-happy';
          break;
        case 1:
          this.imgSrc = UsuallyHappy;
          this.bgColor = 'u-bg-usually-happy';
          break;
        case 2:
          this.imgSrc = VeryHappy;
          this.bgColor = 'u-bg-very-happy';
          break;
        default:
          break;
      }

      return false;
    },
  },
};
</script>
