<script setup>
import Counter from "./components/Counter.vue";
import logo from "../images/logo-with-shadow.png";
</script>

<template>
    <h1>Hello World</h1>
    <img :src="logo" />
    <img src="../images/logo-with-shadow.png" />
    <Counter />
    <p class="text-primary">Hello</p>
    <button type="button" class="btn btn-primary">ボタン</button>
    <button type="button" class="btn btn-primary rounded-pill">長丸ボタン</button>
    <p class="text-success">Hello</p>
</template>
