import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useStorePagination = defineStore('pagination', () => {
  const dispPage = ref(1);

  const changeStorePage = (val) => {
    dispPage.value = val;
  };

  return { dispPage, changeStorePage };
});
