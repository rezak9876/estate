<template>
  <div id="page-content" class="bg-light shadow-lg p-3 mb-5 bg-body rounded">
    <Header :header-info="headerInfo" />

    <form
      id="myform"
      method="POST"
      class="frmAjax form-vertical"
      action="http://127.0.0.1:8000/api/v1/admin/terms"
      enctype="multipart/form-data"
    >
      <div class="mb-3">
        <label for="title" class="form-label">title</label>
        <input
          v-model.lazy="term.title"
          type="text"
          class="form-control"
          id="title"
          name="title"
          aria-describedby="emailHelp"
        />
        <input type="hidden" name="_method" value="patch" />
      </div>

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
import { ref } from "vue";
import { useRoute } from "vue-router";
import axios from "axios";

export default {
  inject: ["toastShow"],
  setup() {
    const loading = ref(false);
    const term = ref({});
    const route = useRoute();
    const id = route.params.id;
    function getTerm() {
      axios
        .get("/terms/" + id)
        .then(function (response) {
          term.value = response.data.data;
        })
        .catch(function (error) {});
    }
    getTerm();
    return { term, loading, id };
  },
  mounted() {
    const vuethis = this;
    $("form#myform").submit(function (e) {
      e.preventDefault();
      vuethis.loading = true;
      var formdata = new FormData(this);

      axios
        .post("/terms/" + vuethis.id,formdata)
        .then(function (response) {

          vuethis.toastShow('success', response.data.message);
          router.push({ name: "terms" });

        })
        .catch(function (error) {
          vuethis.loading = false;

          console.log(3 === '3');
          const obj = error.response.data.errors;
          const firstmessage = obj[Object.keys(obj)[0]][0];
          vuethis.toastShow("error", firstmessage);
        });
    });
  },
  components: {
    Header,
  },
  data() {
    return {
      headerInfo: {
        button: {
          title: "بازگشت",
          link: { name: "terms" },
          color: "btn btn-danger",
          icon: "bi bi-arrow-left",
        },
        title: "دسته بندی ها",
      },
    };
  },
};
</script>

<style>
</style>