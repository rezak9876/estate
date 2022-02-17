<template>
  <GetLoading v-if="loading" />
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
          :type="row.input_type"
          class="form-control"
          :id="index"
          :name="index+((typeof row.attributes !== 'undefined' && row.attributes.multiple)?'[]':'')"
          aria-describedby="emailHelp"
          :multiple="
            typeof row.attributes !== 'undefined' && row.attributes.multiple
          "
        />
      </div>

      <div v-if="row.type == 'textarea'">
        <label :for="index" class="form-label">{{ row.persianName }}</label>
        <textarea
          v-model.lazy="data[index]"
          class="form-control"
          :id="index"
          :name="index"
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
          <optgroup
            v-for="(optgroup, optgroup_index) in row.optgroups"
            :key="optgroup_index"
            :label="optgroup.persianName"
          >
            <option
              v-for="(label, value) in optgroup.options"
              :key="value"
              :value="value"
            >
              {{ label }}
            </option>
          </optgroup>
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
                  :checked="hasAll(category.children, index)"
                  @change="motherchange($event, category.children, index)"
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
                v-for="child in category.children"
                :key="child.id"
              >
                <input
                  :name="index + '[]'"
                  :value="child.id"
                  class="form-check-input ml-2"
                  v-model="data[index]"
                  type="checkbox"
                  :id="index + child.id"
                />

                <label class="form-check-label" :for="index + child.id">{{
                  child.title
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

      <div v-if="row.type == 'multiple_checkboxes'">
        <div class="form-check-inline" id="children">
          <div v-for="(label, value) in row.children" :key="value">
            <input
              :value="value"
              :name="index+'[]'"
              class="form-check-input ml-2"
              v-model="data[index]"
              type="checkbox"
              :id="index + value"
            />

            <label class="form-check-label" :for="index + value">{{
              label
            }}</label>
          </div>
        </div>
      </div>

      <div v-if="(row.type == 'map') && !loading">
        <Map :data="data" />
      </div>
    </div>
  </div>
</template>

<script>
import Table from "../../../components/Modules/Partials/Table.vue";
import Map from "./FormPartials/Map.vue";
import { ref } from "vue";
import { useRoute } from "vue-router";
import axios from "axios";
import * as $ from "jquery";

import GetLoading from "../../sections/GetLoading.vue";

export default {
  components: {
    Table,
    GetLoading,
    Map,
  },
  props: {
    module: Object,
  },
  setup(props) {
    const loading = ref(true);
    const data = ref({});

    const route = useRoute();
    const id = route.params.id;
    const module = props.module;

    $("input").on({
      mouseenter: function () {
        alert("mouseenter");
      },
      mouseleave: function () {
        alert("mouseleave");
      },
      click: function () {
        alert("click");
      },
    });
    for (var field_index in module.formfields) {
      let field = module.formfields[field_index];
      if (
        field.type === "checkboxgroup" ||
        field.type === "multiple_checkboxes"
      )
        data.value[field_index] = [];

      if (typeof field.events !== "undefined") {
        for (var event in field.events) {
          let events_object = field.events;
          let handler = events_object[event];
        }
        // $("p").on("click", function () {
        //   $(this).hide();
        // });
      }
    }
    if (id) {
      function getData() {
        axios
          .get("/" + module.pluralName + "/" + id)
          .then(function (response) {
            data.value = response.data.data;
          })
          .catch(function (error) {})
          .then(function () {
            loading.value = false;
          });
      }
      getData();
    } else {
      loading.value = false;
    }

    function motherchange(event, children, checkbox_name) {
      let mother_checkbox_status = event.target.checked;

      for (var currentValue in children) {
        let data_checkbox_index = data.value[checkbox_name].indexOf(
          children[currentValue].id
        );
        if (mother_checkbox_status === true) {
          if (data_checkbox_index < 0) {
            data.value[checkbox_name].push(children[currentValue].id);
          }
        } else {
          if (data_checkbox_index > -1) {
            data.value[checkbox_name].splice(data_checkbox_index);
          }
        }
      }
    }

    function hasAll(children, group_checkbox_name) {
      let has_all = true;
      for (var currentValue in children) {
        has_all &= data.value[group_checkbox_name].includes(
          children[currentValue].id
        );
      }
      return has_all;
    }
    return { loading, module, data, motherchange, hasAll };
  },
};
</script>

<style>
</style>
