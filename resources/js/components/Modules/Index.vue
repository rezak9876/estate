<template>
  <div class="container mt-3"></div>

  <div id="page-content" class="bg-light shadow-lg p-3 mb-5 bg-body rounded">
    <Header :header-info="headerInfo" />
    <slot></slot>
  </div>
</template>

<script>
window.bootstrap = require("bootstrap/dist/js/bootstrap.bundle.js");
import Header from "../../components/sections/Header.vue";

export default {
  components: {
    Header,
  },
  props: {
    module: Object,
  },
  setup(props) {
    const headerInfo = {
      button: {
        title: "افزودن",
        link: { name: props.module.pluralName + "Create" },
        color: "btn btn-second-color",
        icon: "bi bi-plus-lg",
      },
      title: props.module.pluralPersianName,
    };
    return { headerInfo };
  },
};
</script>

<style>
</style>