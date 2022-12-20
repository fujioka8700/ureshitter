<script setup>
import logo from '../../../images/logo.svg';
</script>

<template>
  <header class="l-header shadow-sm bg-white position-fixed top-0 start-0 w-100">
    <div class="container">
      <div class="wrapper pt-3 pb-3">
        <router-link :to="{ name: 'home' }" class="text-decoration-none">
          <div class="d-flex align-items-center">
            <img :src="logo" alt="Ureshitterのロゴ" />
            <h1 class="header-logo ms-1 text-black">Ureshitter</h1>
          </div>
        </router-link>
      </div>
    </div>
  </header>
</template>
