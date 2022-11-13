<script setup>
import ArticleItem from './ArticleItem.vue';
</script>

<template>
  <ul class="list-group">
    <li v-for="item in items" :key="item">
      <ArticleItem />
    </li>
  </ul>
</template>

<script>
export default {
  data() {
    return {
      items: 5,
    };
  },
};
</script>

<style lang="scss" scoped></style>
