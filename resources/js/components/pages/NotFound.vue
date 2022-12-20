<template>
  <div class="p-notfound main-background">
    <div class="text-center pt-4 pb-4">
      <span>404 ページを表示できません。</span>
    </div>
    <div class="text-center">
      <TopButton />
    </div>
  </div>
</template>

<script>
import TopButton from '../modules/TopButton.vue';

export default {
  components: {
    TopButton,
  },
};
</script>
