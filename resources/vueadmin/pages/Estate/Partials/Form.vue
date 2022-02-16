<template>
  <Form :module="module" :key="componentKey" />
</template>

<script>
import Form from "../../../components/Modules/Partials/Form.vue";
import module from "../config";
import axios from "axios";
import { ref } from "vue";
export default {
  components: {
    Form,
  },
  beforeCreate() {
    const vd = this;
    axios
      .get("/estates/create")
      .then(function (response) {
        module.formfields.terms.children = response.data.terms;
        module.formfields.bool_facilities.children =
          response.data.bool_facilities;
          var int_facilities = response.data.int_facilities
        for (var facility_id in int_facilities) {
          alert(facility_id)
          module.formfields['int_facilities['+facility_id+']'] = {};
          module.formfields['int_facilities['+facility_id+']'].persianName = int_facilities[facility_id];
          module.formfields['int_facilities['+facility_id+']'].type = 'input';
          module.formfields['int_facilities['+facility_id+']'].input_type = 'number';
          module.formfields['int_facilities['+facility_id+']'].col = 6;
        }

        var txt_facilities = response.data.txt_facilities
        for (var facility_id in txt_facilities) {
          alert(facility_id)
          module.formfields['txt_facilities['+facility_id+']'] = {};
          module.formfields['txt_facilities['+facility_id+']'].persianName = txt_facilities[facility_id];
          module.formfields['txt_facilities['+facility_id+']'].type = 'input';
          module.formfields['txt_facilities['+facility_id+']'].input_type = 'number';
          module.formfields['txt_facilities['+facility_id+']'].col = 6;
        }
      })
      .catch(function (error) {})
      .then(function () {
        vd.componentKey++;
      });
  },
  setup() {
    const componentKey = ref(3);
    return { module, componentKey };
  },
};
</script>

<style></style>
