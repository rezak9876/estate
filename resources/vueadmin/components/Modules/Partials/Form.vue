<template>
    <div class="mb-3 row">
        <div
            v-for="(row, index) in module.formfields"
            :key="index"
            :class="'col-' + row.col"
        >
            <div v-if="row.type == 'input'">
                <label :for="index" class="form-label">{{
                    row.persianName
                }}</label>
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
                <label :for="index" class="form-label">{{
                    row.persianName
                }}</label>
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

            <div v-if="row.type == 'checkbox'">
                <div class="form-check">
                    <label class="form-check-label">{{
                        row.persianName
                    }}</label>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Table from "../../../components/Modules/Partials/Table.vue";
import { ref } from "vue";
import { useRoute } from "vue-router";
import axios from "axios";

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

        return { module, data };
    },
};
</script>

<style></style>
