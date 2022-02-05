<template>
  <div class="container mt-3"></div>

  <div id="page-content" class="bg-light shadow-lg p-3 mb-5 bg-body rounded">
    <div
      class="d-flex justify-content-between align-items-center container my-5"
    >
      <div>
        <i class="bi bi-justify"></i>
        دسته بندی ها
      </div>
      <!-- <button type="button" class="btn btn-second-color">
        <i class="bi bi-plus-lg"></i>
        افزودن
      </button> -->

      <router-link to="/terms/create" class="btn btn-second-color">
        <i class="bi bi-plus-lg"></i>
        افزودن
      </router-link>
    </div>

    <Table :key="componentKey" />
  </div>
</template>

<script>
window.bootstrap = require("bootstrap/dist/js/bootstrap.bundle.js");
import Table from "../../components/sections/Table.vue";
import { ref } from "vue";

export default {
  components: {
    Table,
  },
  setup() {
    //refresh table list
    const componentKey = ref(0);
    function someMethod() {
      this.componentKey += 1;
    }
    return {someMethod,componentKey};
  },
};
</script>

<style>
</style>