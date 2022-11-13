<script setup>
import TheHeader from './components/TheHeader.vue';
import LittleHappy from '../images/little-happy.svg';
import UsuallyHappy from '../images/usually-happy.svg';
import VeryHappy from '../images/very-happy.svg';
</script>

<template>
  <TheHeader />

  <section>
    <div class="container">
      <form action="">
        <div class="d-flex align-items-center mt-3">
          <label for="Name" class="text-nowrap">名前</label>
          <input type="text" name="name" class="form-control ms-1" id="Name" placeholder="名無し" />
        </div>
        <!-- End of name input -->

        <div class="mt-3 d-flex justify-content-between">
          <div class="card pt-1 pb-0 px-1">
            <img
              :src="LittleHappy"
              alt="カードの画像"
              class="card-img-top bg-secondary bg-opacity-25 rounded-1"
            />
            <div class="card-body p-0">
              <p class="card-text text-center">少しうれしい</p>
            </div>
          </div>
          <div class="card pt-1 pb-0 px-1">
            <img
              :src="UsuallyHappy"
              alt="カードの画像"
              class="card-img-top bg-secondary bg-opacity-25 rounded-1"
            />
            <div class="card-body p-0 position-relative">
              <p class="card-text text-center">うれしい</p>
            </div>
          </div>
          <div class="card pt-1 pb-0 px-1">
            <img
              :src="VeryHappy"
              alt="カードの画像"
              class="card-img-top bg-secondary bg-opacity-25 rounded-1"
            />
            <div class="card-body p-0">
              <p class="card-text text-center">すごくうれしい</p>
            </div>
          </div>
        </div>
        <!-- End of happiness -->

        <div class="mt-3">
          <label for="Textarea" class="form-label">うれしかったこと</label>
          <textarea
            class="form-control"
            id="Textarea"
            rows="3"
            placeholder="10円拾ったよ"
          ></textarea>
        </div>
        <!-- End of textarea -->

        <div class="mt-3 text-center border-bottom pb-3">
          <button type="submit" class="btn btn-primary">投稿する</button>
        </div>
        <!-- End of submit button -->
      </form>
    </div>
  </section>
</template>
