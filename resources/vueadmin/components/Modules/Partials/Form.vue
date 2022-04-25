<template>
  <GetLoading v-if="loading" />
  <div v-else class="mb-3 row">
    <Filelds :module="module" :data="data" />
  </div>
</template>

<script>
import Table from "../../../components/Modules/Partials/Table.vue";
import Map from "./FormPartials/Map.vue";
import { ref, onUpdated, onMounted } from "vue";
import { useRoute } from "vue-router";
import axios from "axios";
import * as $ from "jquery";
import router from "../../../router";

import GetLoading from "../../sections/GetLoading.vue";
import Filelds from "./Filelds.vue";

export default {
  components: {
    Table,
    GetLoading,
    Map,
    Filelds,
  },
  props: {
    module: Object,
    data: Object,
  },
  setup(props) {
    onMounted(() => {
      // for (var event_index in module.events) {
      //   const f = module.events[event_index];
      //   f();
      // }
    });
    const loading = ref(true);
    const data = ref({});

    if (typeof props.data !== "undefined") data.value = props.data;

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
          .get("/" + module.pluralName + "/" + id + "/edit")
          .then(function (response) {
            data.value = response.data.data;
          })
          .catch(function (error) {
            if (error.response.status == 403) router.push("/");
            if (error.response.status == 404) router.push("/");
          })
          .then(function () {
            loading.value = false;
          });
      }
      getData();
    } else {
      loading.value = false;
    }

    return {
      loading,
      module,
      data,
    };
  },
  // created(){
  //   alert('created')
  // },
  mounted() {
    // alert('mounted')
  },
  // updated(){
  //   alert('updated')
  // },
  // renderTracked(){
  //   alert('renderTracked')
  // },
  // renderTriggered(){
  //   alert('renderTriggered')
  // },
  // activated(){
  //   alert('activated')
  // },
  // serverPrefetch(){
  //   alert('serverPrefetch')
  // },
};
</script>

<style>
</style>
