<template>
  <div>
    <button type="button" class="btn btn-secondary">
      <router-link :to="{ name: 'home' }" class="text-decoration-none">
        <span class="text-white">トップ画面に戻る</span>
      </router-link>
    </button>
  </div>
</template>

<script>
export default {};
</script>
