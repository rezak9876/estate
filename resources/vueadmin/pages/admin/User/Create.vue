<template>
  <Create :module="module">
    <Form />
  </Create>
</template>

<script>
import Create from "../../../components/Modules/Create.vue";
import Form from "./Partials/Form.vue";
import module from "./config";

export default {
  components: {
    Create,
    Form,
  },
  setup() {
    return { module };
  },
};
</script>

<style>
</style>