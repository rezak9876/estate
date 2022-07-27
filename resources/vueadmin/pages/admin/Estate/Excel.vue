<template>
  <h2>خروجی اکسل آگهی ها</h2>
  <button
    @click="getEstateExcel"
    class="btn btn-primary"
    :disabled="expotExcelUrl.loading"
  >
    <div v-if="expotExcelUrl.loading">
      <span
        class="spinner-border spinner-border-sm"
        role="status"
        aria-hidden="true"
      ></span>
      پردازش...
    </div>
    <span v-else>دریافت</span>
  </button>
  <a class="mx-5" v-if="expotExcelUrl.url" :href="expotExcelUrl.url"
    >دانلود فایل اکسل</a
  >
  <hr />
  <h2>آپلود اکسل آگهی ها</h2>
  <form @submit="formSubmitted">
    <div class="mb-3">
      <label class="form-label"
        ><a href="/files/estaet-import-example.xlsx"
          >دانلود نمونه فایل اکسل</a
        ></label
      >
      <input
        v-on:change="excelfilechanges($event)"
        class="form-control form-control-sm"
        type="file"
        accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
      />
    </div>
    <small class="bg-warning"
      >سطر اول باید شامل نوع ،نوع ملک، متراژ، سال ساخت، قیمت خرید، قیمت رهن،
      قیمت اجاره، عنوان، اسلاگ، توضیحات، عرض جغرافیایی، طول جغرافیایی، استان،
      شهر، منطقه، محله، آدرس، امکانات، شرایط، تعداد اتاق، جنس کف باشد</small
    >
    <br />
    <button type="submit" class="btn btn-primary float-end" :disabled="loading">
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

  <table v-if="table.length" class="table responsive text-center">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">عنوان</th>
        <th scope="col">وضعیت</th>
        <th scope="col">پیغام</th>
      </tr>
    </thead>
    <tbody>
      <tr
        v-for="(row, index) in table"
        :key="index"
        :class="row.status == 'success' ? 'table-success' : 'table-danger'"
      >
        <th scope="row">{{ index + 1 }}</th>
        <td>{{ row.title }}</td>
        <td>{{ row.status == "success" ? "موفق" : "ناموفق" }}</td>
        <td>{{ row.message }}</td>
      </tr>
    </tbody>
  </table>
</template>

<script>
import { ref, inject } from "vue";
import axios from "axios";

export default {
  setup() {
    const loading = ref(false);
    const table = ref([]);
    const toastShow = inject("toastShow");
    const formData = ref({
      excelfile: null,
    });
    function formSubmitted(e) {
      e.preventDefault();
      loading.value = true;
      let formDataAxios = new FormData();
      formDataAxios.append("excelfile", formData.value.excelfile);
      axios
        .post("/estates/uploadexcel", formDataAxios)
        .then(function (response) {
          toastShow("success", response.data.message);
          table.value = response.data.data;
          loading.value = false;
        })
        .catch(function (error) {
          const obj = error.response.data.errors;
          let message;
          if (typeof obj === "undefined") message = "مشکلی پیش آمده است";
          else message = obj[Object.keys(obj)[0]][0];
          toastShow("error", message);
          loading.value = false;
        })
        .then(function () {});
    }

    function excelfilechanges(event) {
      formData.value.excelfile = event.target.files[0];
    }

    const expotExcelUrl = ref({
      loading: false,
      url: null,
    });

    function getEstateExcel() {
      expotExcelUrl.value.loading = true;

      axios
        .get("/estates/downloadexcel")
        .then(function (response) {
          toastShow("success", response.data.message);
          expotExcelUrl.value.url = response.data.url;
        })
        .catch(function (error) {
          expotExcelUrl.value.loading = false;
          const firstmessage = error.response.data.message;
          toastShow("error", firstmessage);
        })
        .then(function () {
          expotExcelUrl.value.loading = false;
        });
    }
    return {
      loading,
      formSubmitted,
      excelfilechanges,
      table,
      getEstateExcel,
      expotExcelUrl,
    };
  },
};
</script>

<style>
body {
  min-height: 100vh;
}
</style>