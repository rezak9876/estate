<template>
  <Form :module="module" v-if="!loading" />
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
      .get("/users/create")
      .then(function (response) {
        module.formfields.role_id.options = response.data.data.roles;
      })
      .catch(function (error) {})
      .then(function () {
        vd.loading = false;
      });
  },
  setup() {
    const loading = ref(true);

    return { module, loading };
  },
};
</script>

<style>
</style>