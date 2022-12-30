<template>
  <div class="u-hamburger-menu">
    <div class="hamburger">
      <span></span>
      <span></span>
      <span></span>
    </div>

    <nav class="globalMenuSp">
      <ul>
        <li><router-link :to="{ name: 'home' }">Home</router-link></li>
        <li><router-link :to="{ name: 'about' }">Ureshitterとは</router-link></li>
        <li>
          <a href="https://twitter.com/fujioka8700" target="_blank"
            >twitter
            <img
              :src="BoxArrowUpRightWhite"
              class="box-arrow-up-right-white ms-1"
              alt="別ウインドウで開きます"
            />
          </a>
        </li>
        <li>
          <a href="https://github.com/fujioka8700/ureshitter" target="_blank"
            >GitHub
            <img
              :src="BoxArrowUpRightWhite"
              class="box-arrow-up-right-white ms-1"
              alt="別ウインドウで開きます"
            />
          </a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script setup>
import BoxArrowUpRightWhite from '../../../images/box-arrow-up-right-white.svg';
</script>
