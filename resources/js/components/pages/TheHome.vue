<template>
  <div class="p-thehome"><TheSummary /><EmotionForm /><TheArticles /></div>
</template>

<script>
import TheSummary from '../modules/TheSummary.vue';
import EmotionForm from '../modules/EmotionForm.vue';
import TheArticles from '../modules/TheArticles.vue';

export default {
  components: {
    TheSummary,
    EmotionForm,
    TheArticles,
  },
};
</script>
