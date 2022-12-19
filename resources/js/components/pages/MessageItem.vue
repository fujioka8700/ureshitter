<template>
  <div class="p-message-item">
    <div class="item-title">
      <p>MessageItem</p>
      <p>{{ id }}</p>
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

<style lang="scss" scoped>
.p-message-item {
  .item-title {
    padding-top: 60px;
  }
}
</style>
