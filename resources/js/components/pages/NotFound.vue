<template>
  <div class="p-notfound main-background">
    <div class="text-center pt-4 pb-4">
      <span>404 ページを表示できません。</span>
    </div>
    <div class="text-center">
      <button type="button" class="btn btn-secondary">
        <router-link :to="{ name: 'home' }" class="text-decoration-none">
          <span class="text-white">トップ画面に戻る</span>
        </router-link>
      </button>
    </div>
  </div>
</template>

<script>
export default {};
</script>
