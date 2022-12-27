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
          <a href="https://twitter.com/fujioka8700" target="_blank">twitter</a>
        </li>
        <li>
          <a href="https://github.com/fujioka8700/ureshitter" target="_blank">GitHub</a>
        </li>
      </ul>
    </nav>
  </div>
</template>

<script setup></script>

<style lang="scss" scoped></style>
