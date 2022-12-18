<template>
  <div class="c-thearticles">
    <div class="container">
      <div class="mt-3 d-flex justify-content-center">
        <ThePagination @someMessages="messageUpdate" />
      </div>
    </div>
    <ul class="list-group erase-bullet">
      <li v-for="(message, index) in messages" :key="message">
        <ArticleItem
          :name="message.name"
          :emotion="message.emotion"
          :message="message.message"
          :last="index === messages.length - 1"
        />
      </li>
    </ul>
  </div>
</template>

<script>
import ThePagination from './ThePagination.vue';
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

      return false;
    },
  },
};
</script>
