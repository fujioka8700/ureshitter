<template>
  <div class="p-the-about main-background container">
    <div class="mt-2 mb-2 about--breadcrumb">
      <span>Ureshitterについて</span>
    </div>
    <div class="position-relative about__gradation">
      <img class="bg-secondary about--hero" :src="aboutHero" alt="" />
      <div class="position-absolute about--hero-inner text-dark text-opacity-75">
        <span class="d-block">うれしいで</span>
        <span>心をもっと豊かに</span>
      </div>
    </div>
    <div>
      <h2 class="text-center mt-4 mb-4 text-dark text-opacity-75 about-description--title">
        Ureshitterでできること
      </h2>
    </div>
    <div>
      <TheAboutItem :about-thumbnail="aboutRecord">
        <template v-slot:title>うれしいを記録する</template>
        <template v-slot:text>
          日々の生活で、うれしかったことを記録します。記録する際、うれしいの度合いを選んで、コメントを入力します。過去の記録を見返し、うれしかった気持ちを思い出してみてください。
        </template>
      </TheAboutItem>
    </div>
  </div>
</template>

<script setup>
import TheAboutItem from '../modules/TheAboutItem.vue';
import aboutRecord from '../../../images/aboutRecord.png';
import aboutHero from '../../../images/aboutHero.jpg';
</script>
