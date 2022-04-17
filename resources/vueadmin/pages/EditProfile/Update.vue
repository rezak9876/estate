<template>
  <div id="page-content" class="bg-light shadow-lg p-3 mb-5 bg-body rounded">
    <Header :header-info="headerInfo" />

    <form
      id="myform"
      method="POST"
      class="frmAjax form-vertical row"
      enctype="multipart/form-data"
    >
      <input type="hidden" name="_method" value="patch" />
      <Filelds :module="module" :data="data" />

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
import GetLoading from "../../components/sections/GetLoading.vue";
import Filelds from "../../components/Modules/Partials/Filelds.vue";
import module from "./config";
import { onMounted, ref } from "vue";
import axios from "axios";
import router from "../../router";
import { store } from "../../store";
import * as $ from "jquery";

export default {
  components: {
    GetLoading,
    Filelds,
  },
  setup() {
    const loading = ref(true);
    const data = ref({});

    const user_id = store.user.id;

    axios
      .get("/users/" + user_id + "/edit")
      .then(function (response) {
        data.value = response.data.data;
      })
      .catch(function (error) {
        if (error.response.status == 403) router.push("/");
        if (error.response.status == 404) router.push("/");
      })
      .then(function () {
        loading.value = false;
      });

    onMounted(() => {
      $("form#myform").submit(function (e) {
        e.preventDefault();
        loading.value = true;
        var formdata = new FormData(this);

        axios
          .post("/user/edit_profile", formdata)
          .then(function (response) {
            toastShow("success", response.data.message);
            loading.value = false;
            location.reload();
          })
          .catch(function (error) {
            loading.value = false;
            const obj = error.response.data.errors;
            const firstmessage = obj[Object.keys(obj)[0]][0];
            toastShow("error", firstmessage);
          })
          .then(function () {});
      });
    });

    return { module, data };
  },
};
</script>

<style>
</style>