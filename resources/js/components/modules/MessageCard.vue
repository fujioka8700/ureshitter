<template>
  <div class="d-flex justify-content-center">
    <div class="card" style="width: 18rem">
      <img :src="imgSrc" class="m-2" :class="bgColor" alt="" />
      <span class="text-center">{{ emotionMessage }}</span>
      <div class="card-body">
        <p class="card-text">{{ message }}</p>
        <div class="text-end">
          <span>{{ name }} さん</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    imgSrc: {
      type: String,
      required: true,
    },
    bgColor: {
      type: String,
      required: true,
    },
    emotionMessage: {
      type: String,
      required: true,
    },
    message: {
      type: String,
      required: true,
    },
    name: {
      type: String,
      required: true,
    },
  },
};
</script>
