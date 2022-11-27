<script setup>
import ArticleItem from './ArticleItem.vue';
import ThePagination from './ThePagination.vue';
</script>

<template>
  <div class="container">
    <div class="mt-3 d-flex justify-content-center">
      <ThePagination @someMessages="messageUpdate" />
    </div>
  </div>
  <ul class="list-group">
    <li v-for="message in messages" :key="message">
      <ArticleItem :name="message.name" :emotion="message.emotion" :message="message.message" />
    </li>
  </ul>
</template>

<script>
export default {
  data() {
    return {
      messages: [],
    };
  },
  methods: {
    messageUpdate(messages) {
      this.messages = messages;
    },
  },
};
</script>

<style lang="scss" scoped></style>
