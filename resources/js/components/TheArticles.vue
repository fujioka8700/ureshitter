<script setup>
import ArticleItem from './ArticleItem.vue';
</script>

<template>
  <div>ページネーション</div>
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
      currentPage: 1,
      messages: [],
    };
  },
  created() {
    this.getMessages();
  },
  methods: {
    async getMessages() {
      const result = await axios.get(`/api/messages?page=${this.currentPage}`);

      this.messages = result.data.data;
    },
  },
};
</script>

<style lang="scss" scoped></style>
