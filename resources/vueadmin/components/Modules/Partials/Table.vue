<template>
  <GetLoading v-if="loading" />

  <table id="miTabla" class="display responsive dataTable" style="width: 100%">
    <thead>
      <tr>
        <th
          v-for="(row, th_table_index) in module.tableRows"
          :key="th_table_index"
          v-can:[row.permission?row.permission.arg:null]="
            row.permission ? row.permission.value : null
          "
          :style="row.style"
        >
          {{ row.title }}
        </th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="data in datas" :key="data.id">
        <td
          v-for="(row, textTableRows_index) in textTableRows"
          :key="textTableRows_index"
        >
          {{ data[row.slug] }}
        </td>
        <td
          v-for="(row, buttonTableRows_index) in buttonTableRows"
          :key="buttonTableRows_index"
          v-can:[row.permission?row.permission.arg:null]="
            row.permission ? row.permission.value : null
          "
        >
          <button
            v-if="row.slug == 'edit'"
            type="button"
            :data-id="data.id"
            class="editMe"
            :class="
              typeof data.editable == 'undefined' || data.editable
                ? 'btn btn-success'
                : 'btn btn-secondary'
            "
            :disabled="typeof data.editable != 'undefined' && !data.editable"
          >
            <i class="bi bi-pen"></i>
          </button>

          <button
            v-else-if="row.slug == 'delete'"
            type="button"
            class="deleteMe"
            :data-id="data.id"
            :class="
              typeof data.deletable == 'undefined' || data.deletable
                ? 'btn btn-danger'
                : 'btn btn-secondary'
            "
            :disabled="
              (typeof data.deletable != 'undefined' && !data.deletable) ||
              data.loading
            "
          >
            <div v-if="data.loading">
              <span
                class="spinner-border spinner-border-sm"
                role="status"
                aria-hidden="true"
              ></span>
              پردازش...
            </div>
            <i v-else class="bi bi-trash"></i>
          </button>

          <button
            v-else-if="row.slug == 'view'"
            type="button"
            :data-id="data.id"
            class="showMe btn btn-info"
            :disabled="typeof data.editable != 'undefined' && !data.editable"
          >
            <i class="bi bi-eye"></i>
          </button>
        </td>
        <!-- <td v-if="module.pluralName == 'estates'">
          <button
            @click="edit(data.id)"
            type="button"
            :class="data.editable ? 'btn btn-success' : 'btn btn-secondary'"
            :disabled="!data.editable"
          >
            <i class="bi bi-pen"></i>
          </button>
        </td> -->

        <!-- <td v-if="module.pluralName == 'estates'">
          <button
            @click="destroy(data.id)"
            type="button"
            :class="data.deletable ? 'btn btn-danger' : 'btn btn-secondary'"
            :disabled="!data.deletable || data.loading"
          >
            <div v-if="data.loading">
              <span
                class="spinner-border spinner-border-sm"
                role="status"
                aria-hidden="true"
              ></span>
              پردازش...
            </div>
            <i v-else class="bi bi-trash"></i>
          </button>
        </td> -->
      </tr>
    </tbody>
  </table>
</template>

<script>
//datatable
// DataTable
import "../../../../../node_modules/datatables.net-dt/css/jquery.dataTables.min.css";
// Responsive DataTable
import "../../../../../node_modules/datatables.net-responsive-dt/css/responsive.dataTables.min.css";
// DataTable
import "../../../../../node_modules/datatables.net/js/jquery.dataTables.min.js";
//DataTable Responsive
import "../../../../../node_modules/datatables.net-responsive/js/dataTables.responsive.min";
//Initilize DataTable
import "../../../assets/datatable/initialize";

import miDataTable from "../../../assets/datatable/config";

import * as $ from "jquery";

import { onMounted, ref, inject } from "vue";
import router from "../../../router/index.js";

import axios from "axios";
import Swal from "sweetalert2";

import GetLoading from "../../sections/GetLoading.vue";
export default {
  name: "Table",
  inject: ["toastShow"],
  props: {
    module: Object,
  },
  computed: {
    textTableRows: function () {
      return this.module.tableRows.filter((i) => i.type === "text");
    },
    buttonTableRows: function () {
      return this.module.tableRows.filter((i) => i.type === "button");
    },
  },
  setup(props) {
    const loading = ref(true);
    const datas = ref([]);
    const module = props.module;
    let table;
    function getDatas() {
      axios
        .get("/" + module.pluralName)
        .then(function (response) {
          datas.value = response.data.data;
          for (var key in datas.value) {
            datas.value[key]["loading"] = false;
          }
        })
        .catch(function (error) {})
        .then(function () {
          loading.value = false;
          table = miDataTable();
        });
    }
    getDatas();

    const toastShow = inject("toastShow");

    onMounted(() => {
      //delete event
      $(".dataTable").on("click", ".deleteMe", function () {
        let id = $(this).data("id");
        Swal.fire({
          title: "آیا اطمینان دارید",
          text: "بعد از حذف امکان بازگشت وجود ندارد",
          icon: "warning",
          showCancelButton: true,
          cancelButtonText: "انصراف",
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "بله",
          reverseButtons: true,
        }).then((result) => {
          if (result.isConfirmed) {
            let data = {};
            for (var key in datas.value) {
              if (datas.value[key].id == id) {
                data = datas.value[key];
                data.loading = true;
                data["key"] = key;
                break;
              }
            }
            axios
              .delete("/" + module.pluralName + "/" + id)
              .then(function (response) {
                $("#miTabla").DataTable().destroy();
                $.when(datas.value.splice(data.key, 1)).then(function () {
                  miDataTable();
                });
                toastShow("success", response.data.message);
              })
              .catch(function (error) {
                data.loading = false;
                toastShow("error", error.response.data.message);
              });
          }
        });
      });

      //edit event
      $(".dataTable").on("click", ".editMe", function () {
        let id = $(this).data("id");
        router.push({
          name: module.pluralName + "-edit",
          params: { id: id },
        });
      });

      //show event
      $(".dataTable").on("click", ".showMe", function () {
        let id = $(this).data("id");
        router.push({
          name: module.pluralName + "-show",
          params: { id: id },
        });
      });
    });

    return { loading, datas, module };
  },
  components: {
    GetLoading,
  },
};
</script>

<style>
</style>