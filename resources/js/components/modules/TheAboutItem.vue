<template>
  <div class="c-the-about-item mb-4">
    <div class="bg-white ps-sm-3 pt-sm-3 pb-sm-3">
      <h3 class="text-primary fw-normal ps-2 pt-2 pb-1 about--title">
        <slot name="title">ここにタイトルを表示します。</slot>
      </h3>
      <div class="d-flex flex-row">
        <img :src="aboutThumbnail" class="ps-2 pb-2 about--thumbnail" alt="" />
        <p class="p-2 pe-sm-3 ps-sm-3 about--text">
          <slot name="text">ここに説明を表示します。</slot>
        </p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    aboutThumbnail: {
      type: Object,
      required: true,
    },
  },
};
</script>
