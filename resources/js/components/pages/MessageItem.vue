<template>
  <div class="p-message-item main-background">
    <div class="container">
      <div class="text-center pt-4 pb-4">
        <span>名無しさんの、投稿です。</span>
      </div>
    </div>
  </div>
</template>

<script setup></script>

<script>
export default {
  props: {
    id: {
      type: String,
      required: true,
    },
  },
  created() {
    console.log(this.id);
  },
};
</script>
