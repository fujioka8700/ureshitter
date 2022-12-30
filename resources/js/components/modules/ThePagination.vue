<template>
  <div class="c-the-pagination">
    <ul class="pagination">
      <li
        class="page-item inactive"
        :class="current_page == 1 ? 'disabled' : ''"
        @click="changePage(current_page - 1)"
      >
        <span class="page-link u-pointer--cursor page-link__local">«</span>
      </li>
      <li
        v-for="page in frontPageRange"
        :key="page"
        @click="changePage(page)"
        :class="isCurrent(page) ? 'active' : 'inactive'"
        class="page-item"
      >
        <span class="page-link u-pointer--cursor page-link__local">{{ page }}</span>
      </li>
      <li v-show="front_dot" class="page-item disabled inactive">
        <span class="page-link page-link__local">...</span>
      </li>
      <li
        v-for="page in middlePageRange"
        :key="page"
        @click="changePage(page)"
        :class="isCurrent(page) ? 'active' : 'inactive'"
        class="page-item"
      >
        <span class="page-link u-pointer--cursor page-link__local">{{ page }}</span>
      </li>
      <li v-show="end_dot" class="page-item disabled inactive">
        <span class="page-link page-link__local">...</span>
      </li>
      <li
        v-for="page in endPageRange"
        :key="page"
        @click="changePage(page)"
        :class="isCurrent(page) ? 'active' : 'inactive'"
        class="page-item"
      >
        <span class="page-link u-pointer--cursor page-link__local">{{ page }}</span>
      </li>
      <li
        class="page-item inactive"
        :class="current_page >= last_page ? 'disabled' : ''"
        @click="changePage(current_page + 1)"
      >
        <span class="page-link u-pointer--cursor page-link__local">»</span>
      </li>
    </ul>
  </div>
</template>

<script>
import { useStorePagination } from '../../stores/pagination';
import { storeToRefs } from 'pinia';

export default {
  setup() {
    // ページネーションのページ数の管理に、
    // piniaのpaginationストアを使用します。
    const pagination = useStorePagination();
    const { dispPage } = storeToRefs(pagination);
    const { changeStorePage } = pagination;

    return { dispPage, changeStorePage };
  },
  data() {
    return {
      messages: [],
      current_page: 1,
      last_page: 0,
      range: 3,
      front_dot: false,
      end_dot: false,
    };
  },
  emits: ['someMessages'],
  created() {
    // DOM作成前に、以前表示していた、
    // メッセージ一覧のページを取得します。
    this.current_page = this.dispPage;

    this.getMessages();
  },
  computed: {
    /**
     * @return {Array}
     */
    frontPageRange() {
      if (!this.sizeCheck) {
        this.front_dot = false;
        this.end_dot = false;
        return this.calRange(1, this.last_page);
      }

      return this.calRange(1, 2);
    },
    /**
     * @return {Array}
     */
    middlePageRange() {
      let start = '';
      let end = '';

      if (!this.sizeCheck) return [];
      if (this.current_page <= this.range) {
        start = 3;
        end = this.range + 2;
        this.front_dot = false;
        this.end_dot = true;
      } else if (this.current_page > this.last_page - this.range) {
        start = this.last_page - this.range - 1;
        end = this.last_page - 2;
        this.front_dot = true;
        this.end_dot = false;
      } else {
        start = this.current_page - Math.floor(this.range / 2);
        end = this.current_page + Math.floor(this.range / 2);
        this.front_dot = true;
        this.end_dot = true;
      }

      return this.calRange(start, end);
    },
    /**
     * @return {Array}
     */
    endPageRange() {
      if (!this.sizeCheck) return [];

      return this.calRange(this.last_page - 1, this.last_page);
    },
    /**
     * @return {boolean}
     */
    sizeCheck() {
      if (this.last_page <= this.range + 2) {
        return false;
      }

      return true;
    },
  },
  methods: {
    /**
     * 表示するメッセージたちを取得します。
     */
    async getMessages() {
      const result = await axios.get(`/api/messages?page=${this.current_page}`);
      const messages = result.data;

      this.current_page = messages.current_page;
      this.last_page = messages.last_page;
      this.messages = messages.data;

      // ページネーションのページ数を、アプリ全体で管理するため、
      // pagination の store にページ数を保存します。
      this.changeStorePage(this.current_page);

      this.$emit('someMessages', this.messages);
    },
    /**
     * @param {number} start
     * @param {number} end
     * @return {Array}
     */
    calRange(start, end) {
      const range = [];

      for (let i = start; i <= end; i++) {
        range.push(i);
      }

      return range;
    },
    /**
     * クリックしたボタンのページ数に変更します。
     * @param {number} page クリックしたボタンの数値です。
     */
    changePage(page) {
      if (page > 0 && page <= this.last_page) {
        this.current_page = page;
        this.getMessages();
      }
    },
    /**
     * 表示しているページをチェックします。
     * @param {number} page 確認するページ数です。
     * @return {boolean} trueならCSSにactiveを追加します。
     */
    isCurrent(page) {
      return page === this.current_page;
    },
  },
};
</script>
