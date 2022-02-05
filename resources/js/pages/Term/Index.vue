<template>
  <Index :module="module">
    <Table />
  </Index>
</template>

<script>
import Index from "../../components/Modules/Index.vue";
import Table from "./Partials/Table.vue";
import module from "./config";

export default {
  components: {
    Index,
    Table,
  },
  setup() {
    return { module };
  },
};
</script>

<style>
</style>