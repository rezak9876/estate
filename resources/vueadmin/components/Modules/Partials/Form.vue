<template>
  <GetLoading v-if="loading" />
  <div class="mb-3 row">
    <div
      v-for="(row, index) in module.formfields"
      :key="index"
      :class="'col-' + row.col"
    >
      <div
        v-if="row.type == 'input'"
        class="d-flex justify-content-between align-items-center mt-2"
      >
        <img
          v-if="row.input_type == 'file'"
          :src="url[index] ?? '/images/helper/upload.png'"
          class="w-25 m-2"
          alt=""
        />
        <div class="w-100">
          <label :for="index" class="form-label">{{ row.persianName }}</label>
          <input
            v-model.lazy="data[index]"
            :type="row.input_type"
            class="form-control"
            :id="index"
            :name="
              index +
              (typeof row.attributes !== 'undefined' && row.attributes.multiple
                ? '[]'
                : '')
            "
            aria-describedby="emailHelp"
            :multiple="
              typeof row.attributes !== 'undefined' && row.attributes.multiple
            "
          />
        </div>
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
        <div class="form-group">
          <label>{{row.persianName}}</label>
          <div class="form-check">
            <div class="row" id="children">
              <div
                class="col-3 mt-2"
                v-for="(label, value) in row.children"
                :key="value"
              >
                <input
                  v-model="data[index]"
                  :name="index + '[]'"
                  class="form-check-input"
                  :id="index + value"
                  type="checkbox"
                  :value="value"
                />
                <label class="form-check-label" :for="index + value">
                  {{ label }}
                </label>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div v-if="row.type == 'map' && !loading">
        <Map :data="data" />
      </div>

      <div v-if="row.type == 'picture' && data[index]">
        <div class="mt-5">
          <span>برای حذف عکس تیک آن را بزنید.</span>
          <br />
          <div class="d-flex flex-column align-items-center">
            <label :for="index"
              ><img :src="data[index]" style="width: 10rem" alt=""
            /></label>
            <input type="checkbox" :id="index" :name="index" value="true" />
          </div>
          <hr />
        </div>
      </div>

      <div v-if="row.type == 'galleries' && data[index] &&(typeof data[index] == 'object')">
        <div class="mt-5">
          <span>برای حذف عکس تیک آن را بزنید.</span>
          <br />
          <div class="row">
            <div
              v-for="(path, gallery_id) in data[index]"
              :key="gallery_id"
              class="d-flex flex-column align-items-center col-md"
            >
              <label :for="index + gallery_id"
                ><img :src="path" style="width: 10rem" alt=""
              /></label>
              <input
                type="checkbox"
                :id="index + gallery_id"
                :name="index + '[]'"
                :value="gallery_id"
              />
            </div>
          </div>
          <hr />
        </div>
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

    // $("input").on({
    //   mouseenter: function () {
    //     alert("mouseenter");
    //   },
    //   mouseleave: function () {
    //     alert("mouseleave");
    //   },
    //   click: function () {
    //     alert("click");
    //   },
    // });
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

    const url = ref({});
    $(document).ready(() => {
      $("input[type='file']").change(function (e) {
        if ($(this)[0].multiple) {
          // gallery
          let input_name = $(this)[0].name.slice(0, -2);
          const file = e.target.files[0];
          url.value[input_name] = URL.createObjectURL(file);
        } else {
          // picture
          let input_name = $(this)[0].name;
          const file = e.target.files[0];
          url.value[input_name] = URL.createObjectURL(file);
        }
      });
    });
    return { loading, module, data, motherchange, hasAll, url };
  },
};
</script>

<style>
</style>
