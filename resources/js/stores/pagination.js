import { defineStore } from 'pinia';
import { ref } from 'vue';

export const useStorePagination = defineStore('pagination', () => {
  /**
   * ページネーションの、現在表示しているページ数です。
   * @type {number}
   */
  const dispPage = ref(1);

  /**
   * ページネーションのページ数を変更します。
   * @param {number} val 変更するページ数です。
   */
  const changeStorePage = (val) => {
    dispPage.value = val;
  };

  return { dispPage, changeStorePage };
});
