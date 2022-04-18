<template>
  <GetLoading v-if="mount_loading" />

  <div
    v-else
    id="page-content"
    class="bg-light shadow-lg p-3 mb-5 bg-body rounded"
  >
    <form
      id="myform"
      method="POST"
      class="frmAjax form-vertical"
      enctype="multipart/form-data"
    >
      <input type="hidden" name="_method" value="patch" />
      <div class="mb-3 row">
        <Filelds v-if="!mount_loading" :module="module" :data="data" />
      </div>
      <button type="submit" class="btn btn-primary" :disabled="submit_loading">
        <div v-if="submit_loading">
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
import { onMounted, ref, inject } from "vue";
import axios from "axios";
import router from "../../router";
import { store } from "../../store";
import * as $ from "jquery";

export default {
  components: {
    GetLoading,
    Filelds,
  },
  inject: ["toastShow"],

  setup() {
    const data = ref({});

    const user_id = store.user.id;

    const mount_loading = ref(true);

    axios
      .get("/user/get_user_info")
      .then(function (response) {
        data.value = response.data.data;
      })
      .catch(function (error) {
        if (error.response.status == 403) router.push("/");
        if (error.response.status == 404) router.push("/");
      })
      .then(function () {
        mount_loading.value = false;
      });

    const toastShow = inject("toastShow");

    const submit_loading = ref(false);

    onMounted(() => {
      $("form#myform").submit(function (e) {
        e.preventDefault();
        submit_loading.value = true;
        var formdata = new FormData(this);

        axios
          .post("/user/edit_profile", formdata)
          .then(function (response) {
            toastShow("success", response.data.message);
            submit_loading.value = false;
            // location.reload();
          })
          .catch(function (error) {
            submit_loading.value = false;
            const obj = error.response.data.errors;
            const firstmessage = obj[Object.keys(obj)[0]][0];
            toastShow("error", firstmessage);
          })
          .then(function () {});
      });
    });

    return { module, data, mount_loading, submit_loading };
  },
};
</script>

<style>
</style>