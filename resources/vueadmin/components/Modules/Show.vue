<template>
  <div id="page-content" class="bg-light shadow-lg p-3 mb-5 bg-body rounded">
    <Header :header-info="headerInfo" />

    <slot :key="slotkey"></slot>
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
    const has_param = typeof id == "undefined" ? false : true;
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
          })
          .catch(function (error) {
            loading.value = false;
            const obj = error.response.data.errors;
            const firstmessage = obj[Object.keys(obj)[0]][0];
            toastShow("error", firstmessage);
          })
          .then(function () {
            const updated_function = props.module.onUpdatedForm;
            if (updated_function) updated_function();
          });
      });
    });

    const headerInfo = {
      button: {
        title: "بازگشت",
        link: { name: props.module.pluralName + "-show" },
        color: "btn btn-danger",
        icon: "bi bi-arrow-left",
      },
      title: "نمایش " + props.module.singularPersianName,
      permission: {
        value: props.module.pluralName,
      },
    };

    headerInfo.button.link.name = has_param
      ? props.module.pluralName + "-index"
      : "home";

    return { loading, id, headerInfo, slotkey };
  },
  components: {
    Header,
  },
};
</script>

<style>
</style>