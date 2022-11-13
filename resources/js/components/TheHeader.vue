<script setup>
import logo from '../../images/logo.svg';
</script>

<template>
  <header class="c-header shadow-sm bg-white position-fixed top-0 start-0 w-100">
    <div class="container">
      <div class="wrapper pt-3 pb-3 d-flex align-items-center">
        <img :src="logo" alt="Ureshitterのロゴ" />
        <h1 class="header-logo ms-1">Ureshitter</h1>
      </div>
    </div>
  </header>
</template>
