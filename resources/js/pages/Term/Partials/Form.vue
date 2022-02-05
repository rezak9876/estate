<template>
  <div class="mb-3">
    <label for="title" class="form-label">title</label>
    <input
      v-model.lazy="data.title"
      type="text"
      class="form-control"
      id="title"
      name="title"
      aria-describedby="emailHelp"
    />
  </div>
</template>

<script>
import Table from "../../../components/Modules/Partials/Table.vue";
import module from "../config";

export default {
  components: {
    Table,
  },
  props: {
    data: Object,
  },
  setup(props) {
    let data = props.data
    alert(data.title)
    return { module, data };
  },
};
</script>

<style>
</style>