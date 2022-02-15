<template>
  <Form :module="module" />
</template>

<script>
import Form from "../../../components/Modules/Partials/Form.vue";
import module from "../config";
import axios from "axios";

export default {
  components: {
    Form,
  },
  beforeCreate() {
    axios
      .get("/terms")
      .then(function (response) {
        response.data.data.forEach(function (currentValue, index, arr) {
          console.log(currentValue.id, currentValue.title);
          module.formfields.terms.children[currentValue.id] =
            currentValue.title;
        });
      })
      .catch(function (error) {});
  },
  setup() {
    axios
      .get("/permissions")
      .then(function (response) {})
      .catch(function (error) {});

    // module.formfields.terms.children = {
    //   1: "پیش فروش",
    //   2: "مشارکتی",
    //   3: "معاوضه",
    // };
    return { module };
  },
};
</script>

<style></style>
