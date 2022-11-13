<script setup>
import TheHeader from './components/TheHeader.vue';
import EmotionForm from './components/EmotionForm.vue';

import UsuallyHappy from '../images/usually-happy.svg';
</script>

<template>
  <TheHeader />
  <EmotionForm />

  <article>
    <img :src="UsuallyHappy" alt="" />
  </article>
</template>
