<template>
  <div class="c-thearticles">
    <div class="container">
      <div class="mt-3 d-flex justify-content-center">
        <ThePagination @someMessages="messageUpdate" />
      </div>
    </div>
    <div class="pb-3">
      <ul class="list-group erase-bullet">
        <li v-for="(message, index) in messages" :key="message">
          <ArticleItem
            :id="message.id"
            :name="message.name"
            :emotion="message.emotion"
            :message="message.message"
            :created_at="message.created_at"
            :last="index === messages.length - 1"
          />
        </li>
      </ul>
    </div>
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
