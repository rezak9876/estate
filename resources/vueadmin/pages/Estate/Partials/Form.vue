<template>
  <Form :module="module" :key="componentKey" v-mounted="doSomething" />
</template>

<script>
import Form from "../../../components/Modules/Partials/Form.vue";
import module from "../config";
import axios from "axios";
import { ref } from "vue";
import * as $ from "jquery";
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
          module.formfields['int_facilities['+facility_id+']'] = {};
          module.formfields['int_facilities['+facility_id+']'].persianName = int_facilities[facility_id];
          module.formfields['int_facilities['+facility_id+']'].type = 'input';
          module.formfields['int_facilities['+facility_id+']'].input_type = 'number';
          module.formfields['int_facilities['+facility_id+']'].col = 6;
        }

        var txt_facilities = response.data.txt_facilities
        for (var facility_id in txt_facilities) {
          module.formfields['txt_facilities['+facility_id+']'] = {};
          module.formfields['txt_facilities['+facility_id+']'].persianName = txt_facilities[facility_id];
          module.formfields['txt_facilities['+facility_id+']'].type = 'input';
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

     function hide(type) {
            var buy_sell = $(`input[data-group='${type}']`);
            buy_sell.prop('disabled', true);
            buy_sell.parent().addClass('d-none');
        }

        function show(type) {
            var buy_sell = $(`input[data-group='${type}']`);
            buy_sell.prop('disabled', false);
            buy_sell.parent().removeClass('d-none');
        }

        function change_form(type) {
            if (type == 1) {
                show(1)
                hide(0)

            } else {
                show(0)
                hide(1)
            }

        }

    function doSomething(){
            alert('kokok')

        $("select[name=type]").change(function (e) {
            alert('kokok')
            change_form(e.target.value);
        });
    }
    return { module, componentKey ,doSomething};
  },
  mounted(){
     

        
  }
};
</script>

<style></style>
