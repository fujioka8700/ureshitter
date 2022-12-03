<script setup>
import LittleHappy from '../../../images/little-happy.svg';
import UsuallyHappy from '../../../images/usually-happy.svg';
import VeryHappy from '../../../images/very-happy.svg';
</script>

<template>
  <div class="p-thesuccess">
    <div class="container">
      <p class="pt-3">投稿できました。</p>
      <div class="d-flex justify-content-center">
        <div class="card" style="width: 18rem">
          <img :src="LittleHappy" class="text-bg-light m-2" alt="" />
          <span class="text-center">少しうれしい</span>
          <div class="card-body">
            <p class="card-text">
              10円拾ったよ。10円拾ったよ。10円拾ったよ。10円拾ったよ。10円拾ったよ。
            </p>
            <div class="text-end">田中太郎さん</div>
          </div>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-around">
        <button type="button" class="btn btn-info rounded-pill">
          <i class="bi bi-twitter text-white"></i><span class="ms-1 text-white">tweetする</span>
        </button>
        <button type="button" class="btn btn-secondary">
          <router-link :to="{ name: 'home' }" class="text-decoration-none"
            ><span class="text-white">トップ画面に戻る</span></router-link
          >
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      imgSrc: '',
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
          break;
        case 1:
          this.imgSrc = UsuallyHappy;
          break;
        case 2:
          this.imgSrc = VeryHappy;
          break;
        default:
          break;
      }
    },
  },
};
</script>
