<template>
  <Form :module="module"/>
</template>

<script>
import Form from "../../../components/Modules/Partials/Form.vue";
import module from "../config";

export default {
  components: {
    Form,
  },
  setup() {
    return { module };
  },
};
</script>

<style>
</style>