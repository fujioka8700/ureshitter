<template>
  <TheHeader />
  <RouterView />
</template>

<script>
import TheHeader from './components/modules/TheHeader.vue';

export default {
  components: {
    TheHeader,
  },
};
</script>
