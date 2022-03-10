<template>
  <div class="d-flex justify-content-between align-items-center container my-5">
    <div>
      <i class="bi bi-justify"></i>
      {{ headerInfo.title }}
    </div>
    <router-link
      v-can:create="headerInfo.permission"
      :to="headerInfo.button.link"
      :class="headerInfo.button.color"
    >
      <i :class="headerInfo.button.icon"></i>
      {{ headerInfo.button.title }}
    </router-link>
  </div>
</template>

<script>
export default {
  name: "Header",
  props: {
    headerInfo: Object,
  },
  setup(props) {
    console.clear();
    console.log(props.headerInfo);
  },
};
</script>

<style>
</style>