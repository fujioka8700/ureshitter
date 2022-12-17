<script setup>
import LittleHappy from '../../../images/little-happy.svg';
import UsuallyHappy from '../../../images/usually-happy.svg';
import VeryHappy from '../../../images/very-happy.svg';
import { CREATED, EMOTION_MESSAGE } from '../../config';
</script>

<template>
  <div class="p-thesuccess main-background" id="p-thesuccess">
    <div class="container">
      <div class="text-center pt-4 pb-4">
        <span>投稿できました。</span>
      </div>
      <div class="d-flex justify-content-center">
        <div class="card" style="width: 18rem">
          <img :src="imgSrc" class="text-bg-light m-2" alt="" />
          <span class="text-center">{{ emotionMessage }}</span>
          <div class="card-body">
            <p class="card-text">{{ message }}</p>
            <div class="text-end">{{ name }} さん</div>
          </div>
        </div>
      </div>
      <div class="mt-4 d-flex justify-content-around">
        <a
          href="https://twitter.com/share?ref_src=twsrc%5Etfw"
          class="twitter-share-button"
          :data-text="twitterText"
          :data-url="originURL"
          data-size="large"
          data-hashtags="Ureshitter"
          data-lang="ja"
          data-show-count="false"
          >Tweet
        </a>
        <button type="button" class="btn btn-secondary">
          <router-link :to="{ name: 'home' }" class="text-decoration-none">
            <span class="text-white">トップ画面に戻る</span>
          </router-link>
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      message: '',
      emotionMessage: '',
      emotion: null,
      imgSrc: '',
    };
  },
  created() {
    this.goToNotfoudInsteadOfSuccess();

    this.savePostData();

    this.iconType();
  },
  mounted() {
    this.twitterExternalScript();
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
  methods: {
    iconType() {
      switch (this.emotion) {
        case 0:
          this.imgSrc = LittleHappy;
          this.emotionMessage = EMOTION_MESSAGE[0];
          break;
        case 1:
          this.imgSrc = UsuallyHappy;
          this.emotionMessage = EMOTION_MESSAGE[1];
          break;
        case 2:
          this.imgSrc = VeryHappy;
          this.emotionMessage = EMOTION_MESSAGE[2];
          break;
        default:
          break;
      }

      return false;
    },
    goToNotfoudInsteadOfSuccess() {
      const status = parseInt(this.$route.query.status);

      if (status !== CREATED) {
        this.$router.push({ path: 'notfound' });
      }
    },
    savePostData() {
      this.name = this.$route.query.name;
      this.message = this.$route.query.message;
      this.emotion = parseInt(this.$route.query.emotion);
    },
    twitterExternalScript() {
      let scriptEl = document.createElement('script');

      scriptEl.setAttribute('src', 'https://platform.twitter.com/widgets.js');
      document.getElementById('p-thesuccess').appendChild(scriptEl);
    },
  },
};
</script>
