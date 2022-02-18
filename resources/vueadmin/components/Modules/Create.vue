<template>
  <div id="page-content" class="bg-light shadow-lg p-3 mb-5 bg-body rounded">
    <Header :header-info="headerInfo" />

    <form
      id="myform"
      method="POST"
      class="frmAjax form-vertical"
      enctype="multipart/form-data"
    >
      <slot></slot>

      <button type="submit" class="btn btn-primary" :disabled="loading">
        <div v-if="loading">
          <span
            class="spinner-border spinner-border-sm"
            role="status"
            aria-hidden="true"
          ></span>
          پردازش...
        </div>
        <span v-else>ثبت</span>
      </button>
    </form>
  </div>
</template>

<script>
import Header from "../../components/sections/Header.vue";
import * as $ from "jquery";
import router from "../../router.js";
import { onMounted, ref, inject } from "vue";
import axios from "axios";
export default {
  inject: ["toastShow"],
  props: {
    module: Object,
  },
  setup(props) {
    const loading = ref(false);
    const toastShow = inject("toastShow");

    onMounted(() => {
      $("form#myform").submit(function (e) {
        e.preventDefault();
        loading.value = true;
        var formdata = new FormData(this);

        axios
          .post("/" + props.module.pluralName, formdata)
          .then(function (response) {
            toastShow("success", response.data.message);
            router.push({ name: props.module.pluralName });
          })
          .catch(function (error) {
            const response = error.response
            if(response.status == 403)
              toastShow("error", response.data.message);
            else{
              const obj = response.data.errors;
              const firstmessage = obj[Object.keys(obj)[0]][0];
              toastShow("error", firstmessage);
            }
          })
          .then(function (response) {
            loading.value = false;
          });
      });
    });

    const headerInfo = {
      button: {
        title: "بازگشت",
        link: { name: props.module.pluralName },
        color: "btn btn-danger",
        icon: "bi bi-arrow-left",
      },
      title: "افزودن " + props.module.singularPersianName,
    };
    return { loading, headerInfo };
  },
  components: {
    Header,
  },
};
</script>

<style>
</style>