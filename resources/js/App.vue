<template>
  <TheHeader />
  <div class="app-main">
    <RouterView />
  </div>
</template>

<script>
import TheHeader from './components/modules/TheHeader.vue';

export default {
  components: {
    TheHeader,
  },
};
</script>
