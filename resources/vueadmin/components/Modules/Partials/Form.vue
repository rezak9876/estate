<template>
  <div class="mb-3 row">
    <div
      v-for="(row, index) in module.formfields"
      :key="index"
      :class="'col-' + row.col"
    >
      <div v-if="row.type == 'input'">
        <label :for="index" class="form-label">{{ row.persianName }}</label>
        <input
          v-model.lazy="data[index]"
          type="text"
          class="form-control"
          :id="index"
          :name="index"
          aria-describedby="emailHelp"
        />
      </div>

      <div v-if="row.type == 'select'">
        <label :for="index" class="form-label">{{ row.persianName }}</label>
        <select
          v-model.lazy="data[index]"
          class="form-control"
          :id="index"
          :name="index"
          aria-describedby="emailHelp"
        >
          <option
            v-for="(value, integer) in row.options"
            :key="integer"
            :value="integer"
          >
            {{ value }}
          </option>
        </select>
      </div>

      <div v-if="row.type == 'checkboxgroup'">
        <table class="table table-striped table-borderless table-sm">
          <label>{{ row.persianName }}</label>
          <tbody>
            <tr
              v-for="(category, category_index) in row.categories"
              :key="category_index"
            >
              <th scope="row">
                <input
                  :checked="hasAll(category.children,index)"
                  @change="motherchange($event, category.children,index)"
                  type="checkbox"
                  :id="'checkbox_mother' + category.persianName"
                  class="nested_checkbox"
                />
                <label :for="'checkbox_mother' + category.persianName">{{
                  category.persianName
                }}</label>
              </th>
              <!-- children -->
              <th
                scope="row"
                v-for="(child_title, child_index) in category.children"
                :key="child_index"
              >
                <input
                  :value="child_index"
                  class="form-check-input ml-2"
                  v-model="data[index]"
                  type="checkbox"
                  :id="index + children_id"
                />

                <label class="form-check-label" :for="index + children_id">{{
                  child_title
                }}</label>
              </th>
            </tr>
          </tbody>
        </table>

        <!-- <div class="form-check-inline" id="children">
          <div v-for="(label, children_id) in row.children" :key="children_id">
            <input
              :value="children_id"
              class="form-check-input ml-2"
              v-model="data[row.name]"
              type="checkbox"
              :id="row.name + children_id"
            />

            <label class="form-check-label" :for="row.name + children_id">{{
              label
            }}</label>
          </div>
        </div> -->
      </div>
    </div>
  </div>
</template>

<script>
import Table from "../../../components/Modules/Partials/Table.vue";
import { ref } from "vue";
import { useRoute } from "vue-router";
import axios from "axios";
import * as $ from "jquery";

export default {
  components: {
    Table,
  },
  props: {
    module: Object,
  },
  setup(props) {
    const data = ref({});

    const route = useRoute();
    const id = route.params.id;
    const module = props.module;

    for (var field in module.formfields) {
      if (module.formfields[field].type === "checkboxgroup")
        data.value[field] = [];
    }
    if (id) {
      function getData() {
        axios
          .get("/" + module.pluralName + "/" + id)
          .then(function (response) {
            data.value = response.data.data;
          })
          .catch(function (error) {});
      }
      getData();
    }

    function motherchange(event, children, checkbox_name) {
      let mother_checkbox_status = event.target.checked;

      for (var currentValue in children) {
        let data_checkbox_index =
          data.value[checkbox_name].indexOf(currentValue);
        if (mother_checkbox_status === true) {
          if (data_checkbox_index < 0) {
            data.value[checkbox_name].push(currentValue);
          }
        } else {
          if (data_checkbox_index > -1) {
            data.value[checkbox_name].splice(data_checkbox_index);
          }
        }
      }
    }

    function hasAll(children,group_checkbox_name) {
      let has_all = true;
      for (var currentValue in children) {
        has_all &= data.value[group_checkbox_name].includes(currentValue);
      }
      return has_all;
    }
    return { module, data, motherchange, hasAll };
  },
};
</script>

<style></style>
