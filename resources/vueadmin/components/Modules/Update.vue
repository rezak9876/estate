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
      <slot :key="slotkey"></slot>
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
import Header from "../sections/Header.vue";
import * as $ from "jquery";
import router from "../../router/index.js";
import { onMounted, ref, inject } from "vue";
import { useRoute } from "vue-router";
import axios from "axios";

export default {
  inject: ["toastShow"],
  props: {
    module: Object,
  },
  setup(props) {
    const loading = ref(false);
    const route = useRoute();
    const id = route.params.id;
    const vd = this;

    const slotkey = ref(0);

    const toastShow = inject("toastShow");

    onMounted(() => {
      $("form#myform").submit(function (e) {
        e.preventDefault();
        loading.value = true;
        var formdata = new FormData(this);

        axios
          .post("/" + props.module.pluralName + "/" + id, formdata)
          .then(function (response) {
            toastShow("success", response.data.message);
            loading.value = false;
            if (props.module.redirect != false)
              router.push({ name: props.module.pluralName + "-index" });
            else slotkey.value++;
            const updated_function = props.module.onUpdatedForm;
            if (updated_function) updated_function();
          })
          .catch(function (error) {
            loading.value = false;
            const obj = error.response.data.errors;
            const firstmessage = obj[Object.keys(obj)[0]][0];
            toastShow("error", firstmessage);
          })
          .then(function () {
            
          });
      });
    });

    const headerInfo = {
      button: {
        title: "بازگشت",
        link: { name: props.module.pluralName + "-index" },
        color: "btn btn-danger",
        icon: "bi bi-arrow-left",
      },
      title: "ویرایش " + props.module.singularPersianName,
      permission: {
        value: props.module.pluralName,
      },
    };

    return { loading, id, headerInfo, slotkey };
  },
  components: {
    Header,
  },
};
</script>

<style>
</style>