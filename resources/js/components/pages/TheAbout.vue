<template>
  <div class="p-the-about main-background container">
    <div class="mt-2 mb-2 about--breadcrumb">
      <span>Ureshitterについて</span>
    </div>
    <div class="position-relative">
      <img class="bg-secondary about--hero" :src="aboutHero" alt="" />
      <span class="position-absolute about--hero-inner">うれしいで心をもっと豊かに</span>
    </div>
    <div>
      <h2 class="text-center mt-4 mb-4 text-dark text-opacity-75 about-description--title">
        Ureshitterでできること
      </h2>
    </div>
    <div>
      <div class="bg-white ps-sm-3">
        <h3 class="text-primary fw-normal ps-2 pt-2 pb-1 about--title">うれしいを記録する</h3>
        <div class="d-flex flex-row">
          <img :src="aboutRecord" class="ps-2 pb-2 about--thumbnail" alt="" />
          <p class="p-2 pe-sm-3 ps-sm-3 about--text">
            日々の生活で、うれしかったことを記録します。記録する際、うれしいの度合いを選んで、コメントを入力します。過去の記録を見返し、うれしかった気持ちを思い出してください。
          </p>
        </div>
      </div>
      <!-- End of one description -->
    </div>
  </div>
</template>

<script setup>
import aboutRecord from '../../../images/aboutRecord.png';
import aboutHero from '../../../images/aboutHero.jpg';
</script>

<style lang="scss">
.about--breadcrumb {
  font-size: 0.9em;
}

.about--hero {
  width: 100%;
  height: 20vh;
  object-fit: cover;
}

.about--hero-inner {
  top: 0.5em;
  left: 0.3em;
  font-size: 2em;
}

.about-description--title {
  font-size: 1.4em;
}

.about--thumbnail {
  width: 9em;
  object-fit: cover;
}

.about--title {
  font-size: 1.1em;
  color: #008de2 !important;
}

.about--text {
  font-size: 0.9em;
}
</style>
