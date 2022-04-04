<template>
  <Form v-if="!loading" :module="module" />
</template>

<script>
import Form from "../../../../components/Modules/Partials/Form.vue";
import module from "../config";
import axios from "axios";
import { ref } from "vue";

export default {
  components: {
    Form,
  },
  beforeCreate() {
    const vd = this;
  },
  setup() {
    const loading = ref(true);

    axios
      .get("/roles/create")
      .then(function (response) {
        module.formfields.permissions.categories = response.data.data;
      })
      .catch(function (error) {})
      .then(function () {
        loading.value = false;
      });

    return { loading, module };
  },
};
</script>

<style></style>
