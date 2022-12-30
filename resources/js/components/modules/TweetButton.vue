<template>
  <div id="tweet-button">
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
  </div>
</template>

<script>
export default {
  props: {
    twitterText: {
      type: String,
      required: true,
    },
    originURL: {
      type: String,
      required: true,
    },
  },
  mounted() {
    this.twitterExternalScript();
  },
  methods: {
    /**
     * twitter社様が公開している、widgets.jsを実行します。
     */
    twitterExternalScript() {
      let scriptEl = document.createElement('script');

      scriptEl.setAttribute('src', 'https://platform.twitter.com/widgets.js');
      document.getElementById('tweet-button').appendChild(scriptEl);
    },
  },
};
</script>
