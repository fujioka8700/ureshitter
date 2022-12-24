<script setup>
import logo from '../../../images/logo.svg';
</script>

<template>
  <header class="l-header shadow-sm bg-white position-fixed top-0 start-0 w-100">
    <div class="container">
      <div class="wrapper pt-3 pb-3">
        <router-link
          :to="{ name: 'home' }"
          class="d-flex align-items-center text-decoration-none logo-wrap"
        >
          <img :src="logo" alt="Ureshitterのロゴ" />
          <h1 class="header-logo ms-1 text-black">Ureshitter</h1>
        </router-link>
      </div>
    </div>
  </header>
</template>
