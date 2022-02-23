<template>
  <Update :module="module">
    <Form />
  </Update>
</template>

<script>
import Update from "../../components/Modules/Update.vue";
import Form from "./Partials/Form.vue";
import module from "./config";

export default {
  components: {
    Update,
    Form,
  },
  setup() {
    return { module };
  },
};
</script>

<style>
</style>