<template>
  <Form v-if="!loading" :module="module" />
</template>

<script>
import Form from "../../../components/Modules/Partials/Form.vue";
import module from "../config";
import axios from "axios";
import { ref } from "vue";

export default {
  components: {
    Form,
  },
  beforeCreate() {
    const vd = this;
    axios
      .get("/roles/create")
      .then(function (response) {
        module.formfields.permissions.categories = response.data.data;
      })
      .catch(function (error) {})
      .then(function () {});
  },
  setup() {
    const loading = ref(true);
    axios
      .get("/permissions")
      .then(function (response) {
        loading.value = false;
      })
      .catch(function (error) {});

    return { loading, module };
  },
};
</script>

<style></style>
