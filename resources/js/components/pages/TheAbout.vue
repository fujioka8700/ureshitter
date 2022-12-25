<template>
  <div class="p-the-about main-background container">
    <div class="mt-2 mb-2 about--breadcrumb">
      <span>Ureshitterについて</span>
    </div>
    <div class="position-relative about__gradation">
      <img class="bg-secondary about--hero" :src="AboutHero" alt="" />
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
      <TheAboutItem :about-thumbnail="AboutRecord">
        <template v-slot:title>うれしいを記録する</template>
        <template v-slot:text>
          日々の生活で、うれしかったことを記録します。記録する際、うれしいの度合いを選んで、コメントを入力します。過去の記録を見返し、うれしかった気持ちを思い出してみてください。
        </template>
      </TheAboutItem>
      <TheAboutItem :about-thumbnail="AboutShare">
        <template v-slot:title>うれしいを共有する</template>
        <template v-slot:text>
          うれしいの記録は、書き込んだ他の人と共有されて表示されるので、みんなのうれしいを見ることができます。他の人のうれしい度合いも閲覧できるので、どれくらいうれしかったかも見ることができます。
        </template>
      </TheAboutItem>
      <TheAboutItem :about-thumbnail="AboutTweet">
        <template v-slot:title>うれしいをツイートする</template>
        <template v-slot:text>
          みんなのうれしいを閲覧することができます。そのうれしいをいろんな人に伝えたい時は、ツイートすることができます。ツイートしてうれしいを広げていきましょう。
        </template>
      </TheAboutItem>
      <TheAboutItem :about-thumbnail="AboutDelete">
        <template v-slot:title>何か違うな…と思えば、消せる</template>
        <template v-slot:text>
          昨日はうれしかったけど、今日考えたらそこまでうれしくなかったかな。と思った時は削除ボタンを押せば、消すことができます。
        </template>
      </TheAboutItem>
    </div>
  </div>
</template>

<script setup>
import TheAboutItem from '../modules/TheAboutItem.vue';
import AboutHero from '../../../images/aboutHero.jpg';
import AboutRecord from '../../../images/aboutRecord.png';
import AboutShare from '../../../images/aboutShare.png';
import AboutTweet from '../../../images/aboutTweet.png';
import AboutDelete from '../../../images/aboutDelete.png';
</script>
