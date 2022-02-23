<template>
  <Table :module="module"/>
</template>

<script>
import Table from "../../../components/Modules/Partials/Table.vue";
import module from "../config";

export default {
  components: {
    Table,
  },
  setup() {
    return { module };
  },
};
</script>

<style>
</style>