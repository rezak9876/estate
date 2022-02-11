<template>
    <Form :module="module" />
</template>

<script>
import Form from "../../../components/Modules/Partials/Form.vue";
import module from "../config";
import axios from "axios";

export default {
    components: {
        Form,
    },
    setup() {
        axios
            .get("/permissions")
            .then(function (response) {
            })
            .catch(function (error) {
            })
        return { module };
    },
};
</script>

<style></style>
