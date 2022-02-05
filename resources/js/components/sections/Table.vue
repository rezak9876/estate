<template>
  <table id="miTabla" class="display responsive nowrap" style="width: 100%">
    <thead>
      <tr>
        <th>عنوان</th>
        <th width="10px">ویرایش</th>
        <th width="10px">حذف</th>
      </tr>
    </thead>
    <tbody>
      <tr v-for="term in terms" :key="term.id">
        <td>{{ term.title }}</td>
        <td>
          <button @click="edit(term.id)" type="button" class="btn btn-success">
            <i class="bi bi-pen"></i>
          </button>
        </td>
        <td>
          <button
            @click="destroy(term.id)"
            type="button"
            class="btn btn-danger"
            :disabled="term.loading"
          >
            <div v-if="term.loading">
              <span
                class="spinner-border spinner-border-sm"
                role="status"
                aria-hidden="true"
              ></span>
              پردازش...
            </div>
            <i v-else class="bi bi-trash"></i>
          </button>
        </td>
      </tr>
    </tbody>
  </table>
</template>

<script>
//datatable
// DataTable
import "../../../../node_modules/datatables.net-dt/css/jquery.dataTables.min.css";
// Responsive DataTable
import "../../../../node_modules/datatables.net-responsive-dt/css/responsive.dataTables.min.css";
// DataTable
import "../../../../node_modules/datatables.net/js/jquery.dataTables.min.js";
//DataTable Responsive
import "../../../../node_modules/datatables.net-responsive/js/dataTables.responsive.min";
//Initilize DataTable
import "../../assets/datatable/initialize";

import miDataTable from "../../assets/datatable/config";

import * as $ from "jquery";

import { onMounted, ref, inject } from "vue";
import router from "../../router.js";

import axios from "axios";
import Swal from "sweetalert2";
export default {
  name: "Table",
  inject: ["toastShow"],

  setup() {
    onMounted(() => {
      miDataTable();
    });
    const terms = ref([]);
    function getTerms() {
      axios
        .get("/terms")
        .then(function (response) {
          terms.value = response.data.data;
          for (var key in terms.value) {
            terms.value[key]["loading"] = false;
          }
        })
        .catch(function (error) {});
    }
    getTerms();

    function edit(id) {
      router.push({
        name: "termsUpdate",
        params: { id: id },
      });
    }

    const toastShow = inject("toastShow");
    function destroy(id) {
      Swal.fire({
        title: "آیا اطمینان دارید",
        text: "بعد از حذف امکان بازگشت وجود ندارد",
        icon: "warning",
        showCancelButton: true,
        cancelButtonText: "انصراف",
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "بله",
      }).then((result) => {
        if (result.isConfirmed) {
          let term = {};
          for (var key in terms.value) {
            if (terms.value[key].id == id) {
              term = terms.value[key];
              term.loading = true;
              term["key"] = key;
              break;
            }
          }
          axios
            .delete("/terms/" + id)
            .then(function (response) {
              terms.value.splice(term.key, 1);
              toastShow("success", response.data.message);
            })
            .catch(function (error) {
              term.loading = false;
              toastShow("error", error.response.data.message);
            });
        }
      });
    }

    return { terms, destroy, edit };
  },
  // beforeCreate(){
  //   alert('beforeCreate')
  // },
  //  created(){
  //   alert(' created')
  // },
  //  beforeMount(){
  //   alert(' beforeMount')
  // },
  //  mounted(){
  //   alert(' mounted')
  // },
  //  beforeUpdate(){
  //   alert(' beforeUpdate')
  // },
  //  updated(){
  //   alert(' updated')
  // },
  //   activated(){
  //   alert('  activated')
  // },
  //   deactivated(){
  //   alert('  deactivated')
  // },
  //   beforeUnmount(){
  //   alert('  beforeUnmount')
  // },
  //   unmounted(){
  //   alert('  unmounted')
  // },
  //    renderTracked(){
  //   alert('   renderTracked')
  // },
  //    renderTriggered(){
  //   alert('   renderTriggered')
  // },
};
</script>

<style>
</style>