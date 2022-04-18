<template>
  <Form :module="module" />
</template>

<script>
import Form from "../../../components/Modules/Partials/Form.vue";
import module from "../config";
import axios from "axios";
import { ref } from "vue";
import * as $ from "jquery";
import { waitForElm } from "../../../helper/dom";

export default {
  components: {
    Form,
  },
  beforeCreate() {
    const vd = this;
    axios
      .get("/estates/create")
      .then(function (response) {
        module.formfields.type.options = response.data.types;
        module.formfields.use_type_property_id.optgroups =
          response.data.use_type_property_id;
        module.formfields.terms.children = response.data.terms;
        module.formfields.bool_facilities.children =
          response.data.bool_facilities;
        var int_facilities = response.data.int_facilities;
        for (var facility_id in int_facilities) {
          module.formfields["int_facilities[" + facility_id + "]"] = {};
          module.formfields["int_facilities[" + facility_id + "]"].persianName =
            int_facilities[facility_id];
          module.formfields["int_facilities[" + facility_id + "]"].type =
            "input";
          module.formfields["int_facilities[" + facility_id + "]"].input_type =
            "number";
          module.formfields["int_facilities[" + facility_id + "]"].col = 6;
        }

        var txt_facilities = response.data.txt_facilities;
        for (var facility_id in txt_facilities) {
          module.formfields["txt_facilities[" + facility_id + "]"] = {};
          module.formfields["txt_facilities[" + facility_id + "]"].persianName =
            txt_facilities[facility_id];
          module.formfields["txt_facilities[" + facility_id + "]"].type =
            "input";
          module.formfields["txt_facilities[" + facility_id + "]"].col = 6;
        }
      })
      .catch(function (error) {})
      .then(function () {
        // setTimeout(()=>{
        // },8000)
      });
  },

  setup() {
    return { module };
  },
  mounted() {
    waitForElm("select[name='type']").then((elm) => {
      const select_type_tag = $("select[name='type']");
      if (select_type_tag.val() === null) {
        select_type_tag.val(0);
        change_form(0);
      }
      change_form(select_type_tag.val());

      function hide(type) {
        var buy_sell = $(`input[data-group='${type}']`);
        buy_sell.prop("disabled", true);
        buy_sell.parent().parent().parent().addClass("d-none");
      }

      function show(type) {
        var buy_sell = $(`input[data-group='${type}']`);
        buy_sell.prop("disabled", false);
        buy_sell.parent().parent().parent().removeClass("d-none");
      }

      function change_form(type) {
        if (type == 1) {
          show(1);
          hide(0);
        } else {
          show(0);
          hide(1);
        }
      }
    });
  },
  // updated(){
  //   alert('hiup')
  // }
};
</script>

<style></style>
