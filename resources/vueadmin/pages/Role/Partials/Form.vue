<template>
  <Form v-if="!loading" :module="module" :key="componentKey" />
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
        console.log(response.data.data);
        module.formfields.permissions.categories = response.data.data;
      })
      .catch(function (error) {})
      .then(function () {
        vd.componentKey++;
      });
  },
  setup() {
    const loading = ref(true);
    axios
      .get("/permissions")
      .then(function (response) {
        loading.value = false;
      })
      .catch(function (error) {});

    const componentKey = ref(3);
    return { module, componentKey };
  },
};
</script>

<style></style>
