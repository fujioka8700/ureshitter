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
import ThePagination from './modules/ThePagination.vue';
import ArticleItem from './ArticleItem.vue';

export default {
  components: {
    ThePagination,
    ArticleItem,
  },
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
