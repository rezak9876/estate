<template>
  <div id="page-content" class="bg-light shadow-lg p-3 mb-5 bg-body rounded">
    <Header :header-info="headerInfo" />

    <form
      id="myform"
      method="POST"
      class="frmAjax form-vertical"
      enctype="multipart/form-data"
    >
      <input type="hidden" name="_method" value="patch" />
      {{data.title}}
      <Form :data="data" :key="componentKey"/>
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
import { useRoute } from "vue-router";
import axios from "axios";
import module from "./config";
import Form from "./Partials/Form.vue";

export default {
  inject: ["toastShow"],
  setup() {
    const loading = ref(false);
    const data = ref({});
    const route = useRoute();
    const id = route.params.id;
    let componentKey = 0;
    function getData() {
      axios
        .get("/" + module.pluralName + "/" + id)
        .then(function (response) {
          data.value = response.data.data;
          setTimeout(function (){componentKey++}, 6000);
        })
        .catch(function (error) {});
    }
    getData();

    const toastShow = inject("toastShow");

    onMounted(() => {
      $("form#myform").submit(function (e) {
        e.preventDefault();
        loading.value = true;
        var formdata = new FormData(this);

        axios
          .post("/" + module.pluralName + "/" + id, formdata)
          .then(function (response) {
            toastShow("success", response.data.message);
            router.push({ name: module.pluralName });
          })
          .catch(function (error) {
            loading.value = false;
            const obj = error.response.data.errors;
            const firstmessage = obj[Object.keys(obj)[0]][0];
            toastShow("error", firstmessage);
          });
      });
    });

    const headerInfo = {
      button: {
        title: "بازگشت",
        link: { name: module.pluralName },
        color: "btn btn-danger",
        icon: "bi bi-arrow-left",
      },
      title: "ویرایش " + module.singularPersianName,
    };

    return { data,componentKey, loading, id, headerInfo };
  },
  components: {
    Header,
    Form,
  },
};
</script>

<style>
</style>