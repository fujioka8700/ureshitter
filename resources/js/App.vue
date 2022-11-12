<script setup>
import TheHeader from './components/TheHeader.vue';
</script>

<template>
  <TheHeader />

  <section>
    <div class="container">
      <form action="">
        <div class="d-flex align-items-center pt-3">
          <label for="name" class="text-nowrap">名前</label>
          <input
            type="text"
            name="name"
            class="form-control ms-1"
            id="name"
            placeholder="名前を記入してください"
          />
        </div>
      </form>
    </div>
  </section>

  <!-- <section>
    <form>
      <div class="name">
        <label for="name1">名前</label>
        <input type="text" name="name" id="name1" placeholder="鈴木 太郎" />
      </div>
      <div class="emotions">
        <label for="little">
          <input type="radio" name="emotion" value="1" id="little" />少しうれしい
        </label>
        <label for="usually">
          <input type="radio" name="emotion" value="2" id="usually" checked />うれしい
        </label>
        <label for="very">
          <input type="radio" name="emotion" value="3" id="very" />すごくうれしい
        </label>
      </div>
      <div class="opinion">
        <label for="opinion">うれしかったこと</label>
        <textarea id="opinion" placeholder="10円拾ったなど"></textarea>
      </div>
      <div class="example">
        <input type="submit" value="投稿する" />
      </div>
    </form>
  </section> -->
</template>
