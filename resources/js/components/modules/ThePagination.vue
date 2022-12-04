<template>
  <div>
    <ul class="pagination">
      <li
        class="page-item inactive"
        :class="current_page == 1 ? 'disabled' : ''"
        @click="changePage(current_page - 1)"
      >
        <span class="page-link">«</span>
      </li>
      <li
        v-for="page in frontPageRange"
        :key="page"
        @click="changePage(page)"
        :class="isCurrent(page) ? 'active' : 'inactive'"
        class="page-item"
      >
        <span class="page-link">{{ page }}</span>
      </li>
      <li v-show="front_dot" class="page-item disabled inactive">
        <span class="page-link">...</span>
      </li>
      <li
        v-for="page in middlePageRange"
        :key="page"
        @click="changePage(page)"
        :class="isCurrent(page) ? 'active' : 'inactive'"
        class="page-item"
      >
        <span class="page-link">{{ page }}</span>
      </li>
      <li v-show="end_dot" class="page-item disabled inactive">
        <span class="page-link">...</span>
      </li>
      <li
        v-for="page in endPageRange"
        :key="page"
        @click="changePage(page)"
        :class="isCurrent(page) ? 'active' : 'inactive'"
        class="page-item"
      >
        <span class="page-link">{{ page }}</span>
      </li>
      <li
        class="page-item inactive"
        :class="current_page >= last_page ? 'disabled' : ''"
        @click="changePage(current_page + 1)"
      >
        <span class="page-link">»</span>
      </li>
    </ul>
  </div>
</template>

<script>
export default {
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
    this.getMessages();
  },
  computed: {
    frontPageRange() {
      if (!this.sizeCheck) {
        this.front_dot = false;
        this.end_dot = false;
        return this.calRange(1, this.last_page);
      }

      return this.calRange(1, 2);
    },
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
    endPageRange() {
      if (!this.sizeCheck) return [];

      return this.calRange(this.last_page - 1, this.last_page);
    },
    sizeCheck() {
      if (this.last_page <= this.range + 2) {
        return false;
      }

      return true;
    },
  },
  methods: {
    async getMessages() {
      const result = await axios.get(`/api/messages?page=${this.current_page}`);
      const messages = result.data;

      this.current_page = messages.current_page;
      this.last_page = messages.last_page;
      this.messages = messages.data;

      this.$emit('someMessages', this.messages);

      return false;
    },
    calRange(start, end) {
      const range = [];

      for (let i = start; i <= end; i++) {
        range.push(i);
      }

      return range;
    },
    changePage(page) {
      if (page > 0 && page <= this.last_page) {
        this.current_page = page;
        this.getMessages();
      }

      return false;
    },
    isCurrent(page) {
      return page === this.current_page;
    },
  },
};
</script>
